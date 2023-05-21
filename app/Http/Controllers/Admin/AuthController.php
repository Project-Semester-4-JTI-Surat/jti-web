<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AdminProdi;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // DB::beginTransaction(); 
        $date = Carbon::now()->format('y-m-d');
        $statistik_pengajuan = DB::select('SELECT prodi.keterangan, COUNT(prodi_id) as count_prodi FROM `surat` JOIN prodi ON prodi_id = prodi.id GROUP BY prodi_id');
        // dd(Auth::guard('admin')->user()->admin_prod);
        // dd($statistik_pengajuan);
        return view('admin.dashboard',compact('statistik_pengajuan'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
