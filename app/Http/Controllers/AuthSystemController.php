<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthSystemController extends Controller
{
    public function registration(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                // 'name' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'password-comfirm' => 'required|same:password',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return to_route('index');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }

            // $data = $request->all();
            // dd($data);
        }
        return view('users.layouts.signin');
    }
    public function login(Request $request)
    {


        if ($request->isMethod('post')) {
            // dd($request->toArray());
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            // dd($request->all());

            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            dd(Auth::user());
            if (Auth::user()->role == 'admin') {
                // dd("admin");
                return redirect()->route('admin_deshbord');
            } elseif (Auth::user()->role == 'user') {
                // dd('user');
                return to_route('User_deshbord');
            } else {
                return to_route('login')->with('error', 'Invalid email or password');
            }
        }

        return view('users.layouts.login');
    }

    public function Deshbord()
    {
        return view('admin.index');
    }





    public function logout()
    {
        session()->flush();
        Auth::logout();
        return to_route('login')->with('success', 'Logout Successfully');
    }
}
