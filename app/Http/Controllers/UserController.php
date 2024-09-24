<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Chat;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\PayModelImage;
use App\Models\Plan;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function user_show_chat()
    {
        if (is_null(Auth::user()->followed_models)){
            $followed_model = [];
        }else{
            $followed_model = json_decode(Auth::user()->followed_models, true);
        }
        if (empty($followed_model)){
            $my_chats = [];
        }else{
            $my_chats = User::WhereIn('id', $followed_model)->get();
        }
        return view('user.my_chats', compact('my_chats'));
    }
    public function user_dashboard() {
        if (is_null(Auth::user()->followed_models)){
            $followed_model = [];
        }else{
            $followed_model = json_decode(Auth::user()->followed_models, true);
        }
        if (empty($followed_model)){
            $get_user_statuses = UserStatus::where('userid', '=', Auth::user()->id)->get();
        }else{
            $get_user_statuses = UserStatus::where('userid', Auth::user()->id)
                ->orWhereIn('userid', $followed_model)
                ->get();
        }
        $user_models = User::where('user_type', 2)->latest()->paginate(2);
        return view('user.dashboard', compact('user_models', 'get_user_statuses'));
    }

    public function user_coin(){
        $plans = Plan::all();
        $payments = PaymentGateway::where('status', 1)->get();
        return view('user.coin', compact('plans','payments'));
    }

    public function user_order_history(){
        $payments = Payment::where('user_email', '=', Auth::user()->email)->get();
        return view('user.payment', compact('payments'));
    }



    public function user_news(){
        $news = Blog::all();
        return view('user.news', compact('news'));
    }


    public function user_news_detail($url){
        $new = Blog::where('post_url', '=', $url)->first();
        return view('user.news_detail', compact('new',));
    }
    public function pay_to_view_images(Request $request)
    {
        if ($request->amount >  Auth::user()->coin_balance){
            $notification = array(
                'message' => 'Insufficient Coin Balance, Please Fund your coins and Try again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        User::findOrFail(Auth::user()->id)->decrement('coin_balance', $request->amount);
        $pay = new PayModelImage();
        $pay->modelId = $request->modelId;
        $pay->userid = Auth::user()->id;
        $pay->save();
        $notification = array(
            'message' => 'Payment Successful',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function follow_model(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $followedModels = json_decode($user->followed_models, true) ?? [];
        if (in_array($request->modelId, $followedModels)) {
            $notification = array(
                'message' => 'You have already followed this model.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $followedModels[] = $request->modelId;

        $user->followed_models = json_encode($followedModels);
        $user->save();
        $notification = array(
            'message' => 'Model followed successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function user_update_status(Request $request)
    {

        $image = $request->file('file-upload');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/status/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $status = new UserStatus();
        $status->userid = Auth::user()->id;
        $status->image = $path;
        $status->save();
        $notification = array(
            'message' => 'Status Successfully Updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function user_chat_detail($id)
    {
        $chats = Chat::where('userid', '=', Auth::user()->id)->get();
        $data = [
            'chats' => $chats,
            'modelId' => $id,
        ];
        Chat::where('userid', '=', Auth::user()->id)->update(['user_status' => 'read']);
        return view('user.user_chats', $data);
    }

    public function user_chat_add(Request $request){
        $chat = new Chat();

        $baseUrl = request()->getSchemeAndHttpHost();
        if ($request->hasFile('image')) {
            $pdf = $request->file('image');
            $extension = $pdf->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/chat/image/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $pdf->move($directory, $filename);
            $path = $directory . $filename;
        } else {
            $path =NULL;

        }
        $chat->message = $request->message;
        $chat->user_type ="user";
        $chat->userid = Auth::user()->id;
        $chat->image = $path;
        $chat->modelId = $request->modelId;
        $chat->user_status= "read";
        $chat->save();
        $notification = array(
            'message' => 'Message Sent',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
