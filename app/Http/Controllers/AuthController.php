<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login', [
            'title' => 'Sign In / Sign Up',
        ]);
    }

    public function loginAuth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with("success", "Success Login");
        }
        return back()->with('error', 'Email Or Password invalid');
    }

    public function registerAuth(Request $request)
    {
        $data = $request->validate([
            'name' => "required|max:255",
            'profile' => "required|image",
            'email' => 'required',
            'password' => 'required'
        ]);

        $data["password"] = bcrypt($data["password"]);

        if (User::create($data)) {
            return back()->with('success', 'Success Create Account, Please Log In');
        }
        return back()->with('error', 'Error Create Account, Please Try Again');
    }

    public function logoutAuth(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with("success", "Success Logout");
    }
}
