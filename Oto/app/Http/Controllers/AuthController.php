<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectToDashboard();
        }

        return back()->with('error', 'Sai Mật Khẩu Hoặc Email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'Địa chỉ email đã tồn tại. Vui lòng sử dụng một địa chỉ email khác.',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->plain_password = $request->password; 
        $user->role = 'user';
        $user->save();
    
        Auth::login($user);
    
        return $this->redirectToDashboard();
    }
    


    protected function redirectToDashboard()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/index');
        }
    }
    
}
