<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        if (isset(Auth::user()->username)) {
            return view('dashboard');
        } else {
            return view('Auth.login');
        }
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:4',
        ]);

        $user_data = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'active' => 1,
        ];
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt($user_data, $remember_me)) {
            return redirect('dashboard');
        } else {
            return back()
                ->with('error', __('auth.failed'))
                ->withInput();
        }
    }

    public function showRegisterForm()
    {
        if (isset(Auth::user()->username)) {
            return view('dashboard');
        } else {
            return view('Auth.register');
        }
    }

    public function checkregister(Request $request)
    {
        $test = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:4',
            'password_confirmation' =>
                'required_with:password|same:password|min:4',
        ]);

        $user_data = [
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'active' => 1,
        ];
        try {
            $check = User::create($user_data);
        } catch (Exception $ex) {
            return back()
                ->with('error', 'Username นี้มีผู้ใช้แล้ว')
                ->withInput();
        }

        return redirect('/')->withSuccess('สร้างบัญชีสำเร็จ');
    }

    public function logout()
    {
        Auth::logout();
        return view('Auth.login');
    }
}
