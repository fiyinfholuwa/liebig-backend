<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function check_login()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->user_type == 1 || $user->user_type == 2) {
                return redirect()->route('user.dashboard');
            } elseif ($user->user_type == 3) {
                return redirect()->route('dashboard');
            } else {
                // For any other user type, redirect back
                return redirect()->back();
            }
        }
        return redirect()->back();
    }

    public function logout()
    {

        Session::flush();

        Auth::logout();

        return Redirect()->route('login');
    }


}
