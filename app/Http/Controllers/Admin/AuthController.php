<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AdminProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_process(LoginRequest $request)
    {
        // Auth::setProvider('admin');
        // Auth::guard('admin')->attempt()
        $input = $request->only(['username','password']);
        $request->validated();
        // Auth::attempt(['username'=>$input['username'],'password'=>$input['password']])
        if (Auth::guard('admin')->attempt(['username'=>$input['username'],'password'=>$input['password']])) {
            return redirect()->route('admin.dashboard');
        }else {
            return redirect()->back()->with('error','true');
        }
    }

    public function create(Request $request)
    {
        
    }

    public function dashboard()
    {
        // dd(Auth::guard('admin')->user()->admin_prod);
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
