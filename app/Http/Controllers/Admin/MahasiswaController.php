<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $user  = Auth::guard('admin')->user();
        // dd($user->role_id);
        if ($request->ajax()) {
            if ($user->role_id == 2) {
                $mhs = Mahasiswa::with(['prodi'])->get();
            } else {
                $mhs = Mahasiswa::with(['prodi'])->where('prodi_id','=',$user->prodi_id)->get();
            }
            
            return DataTables::of($mhs)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return 
                '<div class="btn-group">
                <button data-toggle="tooltip" data-placement="bottom" title="Reset password mahasiswa" onclick="reset_password(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button> 
                 <button data-toggle="tooltip" data-placement="bottom" title="Hapus data mahasiswa" onclick="delete_data(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-danger"><span class="tf-icons bx bx-trash"></span></button>
                 </div>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.mahasiswa');
    }

    public function reset_password($id) {
        $mhs = Mahasiswa::find($id);
        $mhs->password = 'jtipolije';
        $mhs->update();
        return response()->json(['message'=>'berhasil di reset password']);
    }

    public function hapus($id) {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();
        return response()->json(['message'=>'data berhasil dihapus']);
    }

}
