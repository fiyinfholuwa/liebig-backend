<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user_dashboard(){
        return view('user.dashboard');
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
}
