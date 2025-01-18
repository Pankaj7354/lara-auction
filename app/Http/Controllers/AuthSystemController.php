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
            // $data = $request->all();
            // dd($data);
        }
        return view('users.layouts.signin');
    }
}
