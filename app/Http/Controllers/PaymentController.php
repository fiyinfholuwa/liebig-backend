<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $paypal_base_url = "https://api.sandbox.paypal.com";

    public function admin_gateway_view()
    {
        $gateways = PaymentGateway::latest()->get();
        return view('admin.gateway_view', compact('gateways'));
    }

    public function admin_gateway_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'secret_key' => 'required|string',
            'public_key' => 'required|string'
        ]);

        $gateway = PaymentGateway::findOrFail($id);
        $data = $request->only(['name', 'status', 'secret_key', 'public_key']);

        $result = $gateway->update($data);
        return GeneralController::redirectWithMessage($result, "Gateway Successfully Updated", "No Changes Made", "back");
    }

    private static function generateRandomString($length = 10): string
    {
        return bin2hex(random_bytes($length / 2));
    }

    public function user_buy_coin(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required|string'
        ]);
        $plan_info = Plan::where('id', '=', $request->plan_id)->first();
        $payment = new Payment;
        $reference = self::generateRandomString();
        $payment->referenceId = $reference;
        $payment->amount = $request->amount;
        $payment->user_email = Auth::user()->email;
        $payment->status = "pending";
        $payment->payment_type = "Coin purchase";
        $payment->gateway = $request->payment_type;
        $payment->credit_num = $plan_info->coins;
        $payment->plan_id = $request->plan_id;
        $payment->subscription_status = '';
        $payment->save();
        if ($request->payment_type === 'paypal') {
            return redirect($this->create_payment_paypal(
                $request->amount,
                "USD",
                route('paypal.success'),
                route('paypal.failed'),
                $reference,
                Auth::user()->email
            ));
        }

        return back()->withErrors(['payment_type' => 'Invalid payment type']);
    }

    public static function get_gateway_credentials($gateway): array
    {
        $gateway_info = PaymentGateway::where('name', $gateway)->first();
        return [
            'secret_key' => $gateway_info->secret_key ?? '',
            'public_key' => $gateway_info->public_key ?? ''
        ];
    }

    private function paypal_access_token()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$this->paypal_base_url/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, self::get_gateway_credentials('paypal')['public_key'] . ":" . self::get_gateway_credentials('paypal')['secret_key']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $headers = [
            "Accept: application/json",
            "Accept-Language: en_US"
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response);
        return $responseData->access_token ?? null; // Return null if access token not found
    }

    private function send_to_api_paypal($url,$method, $data = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        if ($data !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->paypal_access_token()
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function create_payment_paypal($amount, $currency, $returnUrl, $cancelUrl, $user_reference, $email)
    {
        $paymentData = json_encode([
            "intent" => "sale",
            "payer" => [
                "payment_method" => "paypal",
                "payer_info" => [
                    "email" => $email // Add email to payer info
                ]
            ],
            "transactions" => [[
                "amount" => [
                    "total" => $amount,
                    "currency" => $currency
                ],
                "description" => $user_reference
            ]],
            "redirect_urls" => [
                "return_url" => $returnUrl,
                "cancel_url" => $cancelUrl
            ]
        ]);
        $url = $this->paypal_base_url . "/v1/payments/payment";
        $payment = $this->send_to_api_paypal($url,"POST", $paymentData);

        if (is_null($payment) || !isset($payment->links)) {
            return GeneralController::redirectWithMessage(true, "", "Please Try Again Later", "user.coins");
        }

        foreach ($payment->links as $link) {
            if ($link->rel === 'approval_url') {
                return $link->href; // Return the approval URL
            }
        }

        return null; // Return null if no approval URL found
    }

    public function verify_paypal($paymentId, $payerId)
    {
        $url = $this->paypal_base_url."/v1/payments/payment/".$paymentId."/execute";
        $paymentResult = $this->send_to_api_paypal($url,"POST", json_encode(["payer_id" => $payerId]));

        if (isset($paymentResult->state) && $paymentResult->state === 'approved') {
            // Payment approved logic here
            return $paymentResult;
        }

        return null; // Return null if payment is not approved
    }

    public  function paypal_failed()
    {
        return GeneralController::redirectWithMessage(false, "", "You have cancelled paypal payment initation, please try again", "user.coins");
    }

    public  function paypal_success(Request $request)
    {
        $paymentId = $request->query('paymentId');
        $payerId = $request->query('PayerID');
        $paymentResult = $this->verify_paypal($paymentId, $payerId);

        if ($paymentResult && isset($paymentResult->state) && $paymentResult->state === 'approved') {

            $description = isset($paymentResult->transactions[0]->description) ? $paymentResult->transactions[0]->description : 'No description available';
             Payment::where('referenceId', '=', $description)->update(['status' =>'paid']);
             $payment_info = Payment::where('referenceId', '=', $description)->first();
             $coins  = $payment_info->credit_num;
             $user = User::findOrFail(Auth::user()->id);
             $user->coin_balance = $user->coin_balance + $coins;
             $user->save();
            return GeneralController::redirectWithMessage(true, "Payment Successful", "You have cancelled paypal payment initation, please try again", "user.dashboard");
        }

        return GeneralController::redirectWithMessage(false, "", "Payment Couldn't be confirmed", "user.coins");
    }


}
