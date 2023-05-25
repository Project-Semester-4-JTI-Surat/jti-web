<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaLoginRequest;
use App\Http\Requests\MahasiswaRegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Anggota;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Foundation\Auth\AuthenticateUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaAuthController extends Controller
{
    // use ThrottlesLogins;
    // use AuthenticateUsers;
    public function index()
    {
        return view('mahasiswa.login');
    }

    public function login_process(MahasiswaLoginRequest $request)
    {
        $input = $request->validated();
        // dd()
        // if ($this->hasTooManyLoginAttempts($input)) {
        //     $this->fireLockoutEvent($input);
        //     return $this->sendLockoutResponse($input);
        // }
        // $this->incrementLoginAttempts($input);
        if (Auth::guard('mahasiswa')->attempt($input)) {
            return redirect()->route('mahasiswa.dashboard');
        }else{
            return redirect()->back();
        }
    }

    public function register()
    {
        $prodi = Prodi::where('id','!=','2')->get();
        // dd($prodi);
        return view('mahasiswa.register',compact('prodi'));
    }

    public function register_process(MahasiswaRegisterRequest $request)
    {
        // dd($request->validated());
        Mahasiswa::create($request->validated());
        return redirect()->route('mahasiswa.login');
    }

    public function dashboard()
    {
        $auth = Auth::guard('mahasiswa')->user();
        $get_anggota = Anggota::join('surat', 'surat_id', 'surat.uuid')->join('status', 'status_id', 'status.id')->where('anggota.nama', '=', $auth->nama)->get(['surat.uuid','surat.judul_ta','surat.kebutuhan','surat.keterangan as keterangan_surat', 'surat.kode_surat', 'status.keterangan']);
        return view('mahasiswa.dashboard',compact('get_anggota'));
    }

    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect()->route('mahasiswa.login');
    }

    public function profile()
    {
        $auth = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.profile',compact('auth'));
    }

    public function update_profile(ProfileUpdateRequest $request)
    {
        $auth = Auth::guard('mahasiswa')->user();
        // dd($auth->uuid);
        Mahasiswa::find($auth->uuid)->update($request->validated());
        return redirect()->route('mahasiswa.login');
    }
}
