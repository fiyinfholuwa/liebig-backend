<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
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
        return view('frontend.models');
    }
    public function model_detail(){
        return view('frontend.model_detail');
    }
//    public function model_detail(){
//        return view('frontend.model_detail');
//    }
}
