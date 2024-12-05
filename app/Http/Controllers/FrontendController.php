<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use App\Models\ContactUs;
use App\Models\ModelImage;
use App\Models\PayModelImage;
use App\Models\PolicyPage;
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
    public function job()
    {
        return view('frontend.job');
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function faq(){
        return view('frontend.faq');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function privacy(){
        $policy = PolicyPage::first();
        return view('frontend.policy', compact('policy'));
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
        'message' => 'Nachricht erfolgreich gesendet. Wir werden uns in Kürze bei Ihnen melden.',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}
public function job_save(Request $request)
{
    $contact = new ApplyJob();

    $image = $request->file('resume');
    $extension = $image->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $directory = 'uploads/resume/';
    if (!file_exists($directory)) {
        mkdir($directory, 0755, true);
    }
    $image->move($directory, $filename);
    $path = $directory . $filename;
    $contact->first_name = $request->first_name;
    $contact->last_name = $request->last_name;
    $contact->email = $request->email;
    $contact->resume = $path;
    $contact->gender = $request->gender;
    $contact->save();
    $notification = array(
        'message' => 'Sie haben sich erfolgreich für die Stelle beworben. Wir werden uns in Kürze bei Ihnen melden.',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}
}
