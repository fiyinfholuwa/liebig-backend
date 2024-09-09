<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Ribbon;
use App\Models\User;
use App\Models\WheelFortune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function admin_add_user_view(){
        return view('admin.user_add');
    }

    public function admin_add_user_save(Request $request){
        $request->validated();
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'phone' => $request->phone,
            'user_status' => 1,
            'user_type' => $request->user_type
        ];
        $result = User::create($data);
        return GeneralController::redirectWithMessage($result, 'User Successfully Added', "User Successfully Could not be saved", 'back');
    }
    public function admin_user_update(Request $request, $id){
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_status' => 1,
            'user_type' => $request->user_type
        ];
        $result = User::update($id, $data);
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
        $user = $this->userService->user_info_by_id($id);
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
            'amount' => $request->amount,
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
            'amount' => $request->amount,
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
        $path = $baseUrl.'/'.$directory . $filename;
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
            $path = $baseUrl.'/'.$directory . $filename;
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

}
