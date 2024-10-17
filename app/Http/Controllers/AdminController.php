<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Chat;
use App\Models\ModelImage;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Ribbon;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\WheelFortune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function admin_add_user_view(){
        return view('admin.user_view');
    }
    public function admin_add_model_view(){
        return view('admin.model_view');
    }

    public function admin_add_user_save(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15|unique:users,username',
            'interested' => 'nullable|string|max:255',
            'user_type' => 'required|numeric|', // Adjust based on your app's logic
        ]);

        // Data array to be passed for creating the user
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'username' => $request->phone, // Assuming username is the phone number
            'user_status' => 1, // Active status
            'interested_in' => $request->interested,
            'coin_balance' => 10, // Initial coin balance
            'user_type' => $request->user_type, // admin or user
        ];

        try {
            $user=  User::create($data);
            if ($request->user_type ==2){
                Session::put('model_id', $user->id);
                return GeneralController::redirectWithMessage(true, 'Model Successfully Added', "User Successfully Could not be saved", 'admin.add.model.view');
            }else{
                return GeneralController::redirectWithMessage(true, 'User Successfully Added', "User Successfully Could not be saved", 'back');
            }
        } catch (\Exception $e) {
            return GeneralController::redirectWithMessage(false, '', "An error occurred: " . $e->getMessage(), 'back');
        }
    }

    public function admin_user_update(Request $request, $id){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'user_status' => 1,
            'user_type' => $request->user_type,
            'interested_in' => $request->interested
        ];
        $result = User::findOrFail($id)->update($data);
        return GeneralController::redirectWithMessage($result, 'User Successfully Updated', "User Could not be Updated", 'admin.user.all');
    }


    public function admin_user_all(){
        $users = User::all();
        return view('admin.user_all', compact('users'));
    }


    public function admin_member_password_change(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->new_password_confirmation === $request->new_password) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Password Changed Successfully for this user',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Password Mismatch',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function admin_member_block(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->user_status = $request->status;
        $user->save();
        $notification = array(
            'message' => 'User Successfully blocked Status Changed' ,
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_user_delete($id){
        $result = User::findOrFail($id)->delete();
        return GeneralController::redirectWithMessage($result, 'User  Successfully Deleted', "User Could not be Deleted", 'back');
    }

    public function admin_user_edit($id){
        $user = User::findOrFail($id);
        return view('admin.user_edit', compact('user'));
    }
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

    public function admin_payment_all(){
        $payments = Payment::latest()->get();
        return view('admin.payment' , ['payments' => $payments]);
    }

    public function admin_plan_view(){
        $plans = Plan::all();
        return view('admin.plan_view', compact('plans'));
    }

    public function admin_add_plan_save(Request $request)
    {
        $plan = new Plan();
        if ($request->hasFile('image')) {
            $attachment = $request->file('image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/plan/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);
            $path = $directory . $filename;
        } else {
            $path = NULL;
        }
        $data = [
            'name' => $request->name,
            'amount' => $request->amount,
            'coins' => $request->coins,
            'status' => $request->status,
            'image' => $path,
        ];
         $plan->create($data);
        return GeneralController::redirectWithMessage(true, 'Plan  Successfully saved', "Plan could not be Saved", 'back');

    }


    public function admin_plan_update(Request $request, $id)
    {
        $plan =  Plan::findOrFail($id);
        if ($request->hasFile('image')) {
            $attachment = $request->file('image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/plan/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);
            $path = $directory . $filename;
        } else {
            $path = $plan->image;
        }
        $data = [
            'name' => $request->name,
            'amount' => $request->amount,
            'coins' => $request->coins,
            'status' => $request->status,
            'image' => $path,
        ];
        $plan->update($data);
        return GeneralController::redirectWithMessage(true, 'Plan  Successfully Updated', "Plan could not be Updated", 'back');

    }

    public function admin_plan_delete($id){
        Plan::findOrFail($id)->delete();
        return GeneralController::redirectWithMessage(true, 'Plan  Successfully Deleted', "Plan could not be Deleted", 'back');
    }




    public function admin_item_view(){
        $items = WheelFortune::all();
        return view('admin.wheel', compact('items'));
    }

    public function admin_add_item_save(Request $request)
    {
        $item = new WheelFortune();
        if ($request->hasFile('image')) {
            $attachment = $request->file('image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/wheel/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);
            $path = $directory . $filename;
        } else {
            $path = NULL;
        }
        $data = [
            'name' => $request->name,
            'points' => $request->points,
            'chance' => $request->chance,
            'status' => $request->status,
            'image' => $path,
        ];
        $item->create($data);
        return GeneralController::redirectWithMessage(true, 'Item  Successfully saved', "Item could not be Saved", 'back');

    }


    public function admin_item_update(Request $request, $id)
    {
        $item =  WheelFortune::findOrFail($id);
        if ($request->hasFile('image')) {
            $attachment = $request->file('image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/plan/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);
            $path = $directory . $filename;
        } else {
            $path = $item->image;
        }
        $data = [
            'name' => $request->name,
            'points' => $request->points,
            'chance' => $request->chance,
            'status' => $request->status,
            'image' => $path,
        ];
        $item->update($data);
        return GeneralController::redirectWithMessage(true, 'Item  Successfully Updated', "Item could not be Updated", 'back');

    }

    public function admin_item_delete($id){
        WheelFortune::findOrFail($id)->delete();
        return GeneralController::redirectWithMessage(true, 'Item  Successfully Deleted', "Item could not be Deleted", 'back');
    }

    public function admin_blog_view()
    {
        return view('admin.blog_view');
    }

    public function admin_blog_edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog_edit', compact('blog'));
    }

    public function admin_blog_save(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/blog/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $new_post = new Blog;
        $new_post->title = $request->title;
        $new_post->author = "Admin";
        $new_post->post_url = $label_slug;
        $new_post->category = $request->category;
        $new_post->body = $request->body;
        $new_post->image = $path;
        $new_post->save();
        $notification = array(
            'message' => 'News Successfully added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function admin_blog_all()
    {
        $blogs = Blog::all();
        return view('admin.blog_all', compact('blogs'));
    }

    public function admin_blog_update(Request $request, $id)
    {
        $blog =  Blog::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $baseUrl = request()->getSchemeAndHttpHost();
        $url_slug = strtolower($request->title);
        $label_slug= preg_replace('/\s+/', '-', $url_slug);
        if ($request->has('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/blog/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $image->move($directory, $filename);
            $path = $directory . $filename;
        }else{
            $path =  $blog->image;
        }

        $blog->title = $request->title;
        $blog->author = "Admin";
        $blog->post_url = $label_slug;
        $blog->category = $request->category;
        $blog->body = $request->body;
        $blog->image = $path;
        $blog->save();
        $notification = array(
            'message' => 'News Successfully Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.all')->with($notification);
    }

    public function admin_blog_delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        $notification = array(
            'message' => 'News Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ribbon_view(){
        $ribbon = Ribbon::first();
        return view('admin.ribbon', compact('ribbon'));
    }
    public function ribbon_save(Request $request){

        if ($request->id == null){
            $ribbon =new Ribbon;
            $ribbon->body = $request->body;
            $ribbon->display = $request->display;
            $ribbon->save();
            $notification = array(
                'message' => 'Announcement Successfully Saved',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $ribbon = Ribbon::findOrFail($request->id);
            $ribbon->body = $request->body;
            $ribbon->display = $request->display;
            $ribbon->save();
            $notification = array(
                'message' => 'Announcement Successfully Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }


    public function admin_model_update(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_me' => 'required|string',
            'my_interest' => 'required|string',
            'address' => 'required|string',
            'sexuality' => 'required|string',
            'eye_color' => 'required|string',
            'hair' => 'required|string',
            'body_type' => 'required|string',
            'height' => 'required|string',
            'ethnicity' => 'required|string',
            'userid' => 'required|exists:users,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($request->userid);
        if ($request->hasFile('profile_image')) {
            $attachment = $request->file('profile_image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/profile/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);
            $user->profile_image = $directory . $filename;
        }

        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $directory = 'uploads/model_images/';
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                $image->move($directory, $filename);
                $uploadedImages[] = $directory . $filename;
            }
            $user->images = json_encode($uploadedImages);
        }
        $user->age = $request->input('email');
        $user->about_me = $request->input('about_me');
        $user->my_interest = $request->input('my_interest');
        $user->address = $request->input('address');
        $user->sexuality = $request->input('sexuality');
        $user->eye_color = $request->input('eye_color');
        $user->hair = $request->input('hair');
        $user->body_type = $request->input('body_type');
        $user->height = $request->input('height');
        $user->ethnicity = $request->input('ethnicity');


        $user->save();
        $notification = array(
            'message' => 'Model information updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function update_model_admin(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'about_me' => 'required|string',
            'my_interest' => 'nullable|string',
            'address' => 'required|string',
            'sexuality' => 'nullable|string',
            'eye_color' => 'nullable|string',
            'hair' => 'nullable|string',
            'body_type' => 'nullable|string',
            'height' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($request->userid);
        if ($request->hasFile('profile_image')) {
            $attachment = $request->file('profile_image');
            $extension = $attachment->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $directory = 'uploads/profile/';
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
            $attachment->move($directory, $filename);

            // Optionally, delete the old profile image if it exists
            if ($user->profile_image && file_exists($user->profile_image)) {
                unlink($user->profile_image);
            }

            $user->profile_image = $directory . $filename;
        }

        // Remove images marked for deletion
        if ($request->filled('removed_images')) {
            foreach ($request->removed_images as $removedImage) {
                if (file_exists($removedImage)) {
                    unlink($removedImage); // Delete the image from storage
                }
            }
            $existingImages = array_diff($user->images, $request->removed_images);
            $user->images = json_encode(array_values($existingImages));
        }

        // Add new images
        if ($request->hasFile('images')) {
            $newImages = [];
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = time() . uniqid() . '.' . $extension;
                $directory = 'uploads/model_images/';
                if (!file_exists($directory)) {
                    mkdir($directory, 0755, true);
                }
                $image->move($directory, $filename);
                $newImages[] = $directory . $filename;
            }

            $existingImages = json_decode($user->images, true) ?? [];
            $user->images = json_encode(array_merge($existingImages, $newImages));
        }
        $user->age = $request->age;
        $user->about_me = $request->about_me;
        $user->my_interest = $request->my_interest;
        $user->address = $request->address;
        $user->sexuality = $request->sexuality;
        $user->eye_color = $request->eye_color;
        $user->hair = $request->hair;
        $user->body_type = $request->body_type;
        $user->height = $request->height;
        $user->ethnicity = $request->ethnicity;
        $user->save();
        return GeneralController::redirectWithMessage(true, 'User Successfully Updated', "User Could not be Updated", 'admin.user.all');
    }


    public function admin_chat_all()
    {
        $chats = Chat::all();
        $g_chats = $chats->groupBy('userid')->map(function ($item) {
            return $item->first();
        });
        return view('admin.chat_all', ['chats' => $g_chats]);
    }

    public function admin_chat_detail($id)
    {
        $chats = Chat::where('userid', '=', $id)->get();
        $data = [
            'chats' => $chats,
            'userid' => $id,
            'name' => User::where('id', '=', $id)->first()->name

        ];
        Chat::where('userid', '=', $id)->update(['model_status' => 'read']);

        return view('admin.admin_chat', $data);
    }

public function admin_chat_add(Request $request){
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
    $chat->user_type ="admin";
    $chat->userid = $request->userid;
    $chat->image = $path;
    $chat->modelId = $request->modelid;
    $chat->model_status= "read";
    $chat->save();
    $notification = array(
        'message' => 'Message Sent',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}


    public function admin_update_status(Request $request)
    {

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/status/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $status = new UserStatus();
        $status->userid = $request->model_id;
        $status->user_type ='model';
        $status->image = $path;
        $status->save();
        $notification = array(
            'message' => 'Status Successfully Updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

public function admin_model_status()
{
    $models = User::where('user_type', '=', 2)->get();
    $items = UserStatus::where('user_type', '=', 'model')->latest()->get();
   return view('admin.model_status', compact('items', 'models'));
}
public function admin_model_images()
{
    $models = User::where('user_type', '=', 2)->get();
    $items = ModelImage::latest()->get();
   return view('admin.model_images', compact('items', 'models'));
}


    public function admin_status_delete($id)
    {
        $status = UserStatus::findOrFail($id);
        $status->delete();
        $notification = array(
            'message' => 'Model Status Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function admin_image_delete($id)
    {
        $status = ModelImage::findOrFail($id);
        $status->delete();
        $notification = array(
            'message' => 'Model Image Successfully Deleted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function admin_update_image(Request $request)
    {

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $directory = 'uploads/status/';
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }
        $image->move($directory, $filename);
        $path = $directory . $filename;
        $status = new ModelImage();
        $status->userid = $request->model_id;
        $status->image = $path;
        $status->image_type = $request->image_type;
        $status->amount = $request->image_type ==='free' ? 0 : $request->amount;
        $status->save();
        $notification = array(
            'message' => 'Image Successfully Updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
