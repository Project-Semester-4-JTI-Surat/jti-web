<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaLoginRequest;
use App\Http\Requests\MahasiswaRegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Anggota;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Exception;
use Illuminate\Foundation\Auth\AuthenticateUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaAuthController extends Controller
{
    // use ThrottlesLogins;
    // use AuthenticateUsers;
    public function index()
    {
//        return view('mahasiswa.login');
        return view('mahasiswa.uiv2.login');
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
            return redirect()->back()->with('error','true');
        }
    }

    public function register()
    {
        $prodi = Prodi::where('id','!=','2')->get();
        // dd($prodi);
//        return view('mahasiswa.register',compact('prodi'));
        return view('mahasiswa.uiv2.register',compact('prodi'));
    }

    public function register_process(MahasiswaRegisterRequest $request)
    {
//        dd($request->validated());
        Mahasiswa::create($request->validated());
        return redirect()->route('mahasiswa.login');
    }

    /**
     * @throws Exception
     */
    public function dashboard(Request $request)
    {
        $status = $request->get('status');
        $auth = Auth::guard('mahasiswa')->user();
        if ($request->ajax()){
            if ($status == '*' || $status == '') {
                $get_anggota = Anggota::join('surat', 'surat_id', 'surat.uuid')->join('status', 'status_id', 'status.id')
                    ->where('anggota.nama', '=', $auth->nama)
                    ->get(['surat.uuid','surat.judul_ta','surat.kebutuhan','surat.keterangan as keterangan_surat','surat.status_id as status_id', 'surat.kode_surat', 'status.keterangan']);
            }else{
                $get_anggota = Anggota::join('surat', 'surat_id', 'surat.uuid')->join('status', 'status_id', 'status.id')
                    ->where('status_id','=',$status)
                    ->where('anggota.nama', '=', $auth->nama)
                    ->get(['surat.uuid','surat.judul_ta','surat.kebutuhan','surat.keterangan as keterangan_surat','surat.status_id as status_id', 'surat.kode_surat', 'status.keterangan']);
            }
//            dd($get_anggota);
            return \DataTables::of($get_anggota)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    return '<a href="' . route('mahasiswa.detail_surat',$row->uuid) . '" class="btn btn-primary">Detail</a>';
                })
                ->addColumn('status', function ($row) {
                    return match ($row->status_id) {
                        1 => '
                        <span class="badge bg-primary">Menunggu Diproses</span>
                        ',
                        2 => '
                        <span class="badge bg-primary">Diproses </span>
                        ',
                        3 => '
                            <span class="badge bg-success">Dapat Diambil </span>
                            ',
                        5 => '
                                <span class="badge bg-danger">Surat Ditolak</span>
                                ',
                        default => '
                    <span class="badge bg-success">Selesai</span>
                    ',
                    };
                })
                ->rawColumns(['aksi','status'])
                ->make(true);
        }
//         dd($get_anggota);
        return view('mahasiswa.uiv2.dashboard');
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
