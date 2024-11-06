<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\ModelImage;
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
        $get_model_images = ModelImage::where('userid', '=', $id)->get();

        $recommended_model = User::where('user_type', '=', 2)->paginate(3);

        return view('frontend.model_detail', compact('model', 'recommended_model', 'get_model_images'));
    }
//    public function model_detail(){
//        return view('frontend.model_detail');
//    }


public function contact_save(Request $request)
{
    $contact = new ContactUs();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->message = $request->message;
    $contact->save();
    $notification = array(
        'message' => 'Message Successfully Sent, We will get back to you shortly.',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}
}
