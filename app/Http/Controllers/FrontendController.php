<?php

namespace App\Http\Controllers;

use App\Models\PayModelImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $models = User::where('user_type', 2)->paginate(3);
        return view('frontend.home', compact('models'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function faq(){
        return view('frontend.faq');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function models(){
        $models = User::where('user_type', 2)->get();
        return view('frontend.models', compact('models'));
    }
    public function model_detail($id){
        $model = User::where('id', '=', $id)->first();
        $recommended_model = User::where('user_type', '=', 2)->paginate(3);
        if (Auth::check()){
            $check_pay_image = PayModelImage::where('userid', '=', Auth::user()->id)->where('modelId', '=', $id)->first();
        }else{
            $check_pay_image = NULL;
        }

        return view('frontend.model_detail', compact('model', 'recommended_model', 'check_pay_image'));
    }
//    public function model_detail(){
//        return view('frontend.model_detail');
//    }
}
