<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Chat;
use App\Models\GiftInventory;
use App\Models\ModelImage;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\PayModelImage;
use App\Models\Plan;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\WheelFortune;
use Carbon\Carbon;
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
        return view('user_new.my_chat', compact('my_chats'));
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
        return view('user_new.dashboard', compact('user_models', 'get_user_statuses'));
    }

    public function user_coin(){
        $plans = Plan::all();
        $payments = PaymentGateway::where('status', 1)->get();
        return view('user_new.coin', compact('plans','payments'));
    }

    public function user_order_history(){
        $payments = Payment::where('user_email', '=', Auth::user()->email)->latest()->get();
        return view('user_new.payment', compact('payments'));
    }
public function user_profile(){
        $payments = GiftInventory::where('userid', '=', Auth::user()->id)->latest()->get();
        $gifts = WheelFortune::all();
        return view('user_new.profile', compact('payments', 'gifts'));
    }


    public function reward_to_wallet(Request $request)
    {
        $reward_id = $request->reward_id;
        $reward_info = GiftInventory::findOrFail($reward_id);
        User::where('id', Auth::user()->id)->increment('coin_balance', $reward_info->reward_amount);
        $reward_info->delete();
        $notification = array(
            'message' => 'You have successfully moved the inventory amount to coin balance.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function user_news(){
        $news = Blog::all();
        return view('user_new.news', compact('news'));
    }


    public function user_news_detail($url){
        $new = Blog::where('post_url', '=', $url)->first();
        return view('user_new.news_detail', compact('new',));
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
        User::findOrFail($request->modelId)->increment('coin_balance', ($request->amount)/2);
        $logged = ModelImage::findOrFail($request->imageId);
        if (is_null($logged->logged_users)) {
            $logged_user = json_encode([Auth::user()->id]);
        } else {
            $existing_logged_users = json_decode($logged->logged_users, true);
            $logged_user = json_encode(array_merge($existing_logged_users, [Auth::user()->id]));
        }
        $logged->logged_users = $logged_user;
        $logged->save();
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
        $chat = new Chat();

        $chat->message = "Hi, My name is . " .Auth::user()->name." I will like to connect with you" ;
        $chat->user_type ="user";
        $chat->userid = Auth::user()->id;
        $chat->modelId = $request->modelId;
        $chat->user_status= "read";
        $chat->save();
        $notification = array(
            'message' => 'Message Sent',
            'alert-type' => 'success'
        );
        return redirect()->route('show.model.chat')->with($notification);
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
        $gifts = GiftInventory::where('userid', '=' , Auth::user()->id)->get();
        $data = [
            'chats' => $chats,
            'modelId' => $id,
            'gifts' => $gifts
        ];
        Chat::where('userid', '=', Auth::user()->id)->update(['user_status' => 'read']);
        return view('user_new.chat_detail', $data);
    }

    public function user_chat_add(Request $request){
        $chat = new Chat();

        $coin_to_chat = 12;
        if ($coin_to_chat > Auth::user()->coin_balance ){
            $notification = array(
                'message' => 'You have Insufficient coins, please reload your coins',
                'alert-type' => 'error'
            );
            return redirect()->route('user.coins')->with($notification);
        }
        User::where('id', Auth::user()->id)->decrement('coin_balance', $coin_to_chat);
        User::where('id', $request->modelId)->increment('coin_balance', $coin_to_chat/2);
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


    public function user_wheel()
    {
        $rewards = WheelFortune::where('status', '=', 1)->paginate(8);
        $rewards = $rewards->items();
        return view('user_new.wheel', compact('rewards'));
    }

    public function spin_validate(Request $request)
    {
        $user = Auth::user();
        $spin_today = $user->spin_today;
        if (is_null($spin_today)) {
            return response()->json(['success' => true]);
        }

        $now = now();

        try {
            $spin_today = Carbon::parse($spin_today);  // Ensure it's a valid Carbon instance
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Invalid spin time.']);
        }
        $hoursDifference = $now->diffInHours($spin_today);
        $hoursDifference = abs($hoursDifference);
        if ($hoursDifference >= 12) {
            return response()->json(['success' => true]);
        }

        $amount_to_spin = 100;
        if (Auth::user()->coin_balance > $amount_to_spin){
            User::where('id', Auth::user()->id)->decrement('coin_balance', $amount_to_spin);
            return response()->json(['success' => true]);
        }

        $hoursLeft = round(12 - $hoursDifference);
        return response()->json([
            'success' => false,
            'message' => "You are not eligible to spin again yet. Please wait {$hoursLeft} more hour(s)."
        ]);
    }



    public function claim_reward(Request $request)
    {
        $reward = $request->input('reward');
        $points = $reward['points'];
        $payment = new Payment;
        $reference = PaymentController::generateRandomString();
        $payment->referenceId = $reference;
        $payment->amount = $points;
        $payment->user_email = Auth::user()->email;
        $payment->status = "paid";
        $payment->payment_type = "Wheel of Fortune";
        $payment->gateway = "Fortune Crediting";
        $payment->credit_num = $points;
        $payment->subscription_status = '';
        $payment->save();
        $user = User::findOrFail(Auth::user()->id);
        $user->coin_balance = $user->coin_balance + $points;
        $user->spin_today = now();
        $user->save();
        return response()->json(['success' => true, 'message' => 'Reward claimed successfully!']);
    }
    public function move_reward(Request $request)
    {
        $reward = $request->input('reward');
        $reward_id = $reward['id'];
        $move = new GiftInventory();
        $move->userid = Auth::user()->id;
        $move->reward_id = $reward_id;
        $move->reward_amount = $reward['points'];
        $move->reward_name = $reward['name'];
        $move->user_type = 'user';
        $move->save();
        $user = User::findOrFail(Auth::user()->id);
        $user->spin_today = now();
        $user->save();
        return response()->json(['success' => true, 'message' => 'Reward Move to Inventory successfully!']);
    }

    public function user_buy_gift(Request $request)
    {
        $reward_info = WheelFortune::findOrFail($request->gift_id);

        if ($reward_info->points > Auth::user()->coin_balance){
            $notification = array(
                'message' => 'You have Insufficient coins, please reload your coins',
                'alert-type' => 'error'
            );
            return redirect()->route('user.coins')->with($notification);

        }
        User::where('id', Auth::user()->id)->decrement('coin_balance', $reward_info->points);
        $move = new GiftInventory();
        $move->userid = Auth::user()->id;

        $move->reward_id = $reward_info->id;
        $move->reward_amount = $reward_info->points;
        $move->reward_name = $reward_info->name;
        $move->user_type = 'user';
        $move->save();
        $notification = array(
            'message' => 'You have successfully purchased this gift, please check your inventory',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function user_send_gift(Request $request)
    {
        $gift_info = GiftInventory::findOrFail($request->gift_id);


        $move = new GiftInventory();
        $move->userid = $request->modelId;
        $move->reward_id = $gift_info->reward_id;
        $move->reward_amount = ($gift_info->reward_amount)/2;
        $move->reward_name = $gift_info->reward_name;
        $move->user_type = 'model';
        $move->save();
        $gift_info->delete();
        $notification = array(
            'message' => 'You have successfully gifted this model',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


    public function model_chat_all()
    {
        $chats = Chat::where('modelId', '=' , Auth::user()->id)->get();
        $g_chats = $chats->groupBy('userid')->map(function ($item) {
            return $item->first();
        });
        return view('user_new.model_chat_all', ['chats' => $g_chats]);
    }

    public function model_chat_detail($id)
    {
        $chats = Chat::where('userid', '=', $id)->get();
        $data = [
            'chats' => $chats,
            'userid' => $id,
            'name' => User::where('id', '=', $id)->first()->name

        ];
        Chat::where('userid', '=', $id)->update(['model_status' => 'read']);

        return view('user_new.model_chat_detail', $data);
    }


    public function model_model_images()
    {
        $models = User::where('user_type', '=', 2)->get();
        $items = ModelImage::where('userid', Auth::user()->id)->latest()->get();
        return view('user_new.model_images', compact('items', 'models'));
    }


}
