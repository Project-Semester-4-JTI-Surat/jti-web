<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $mhs = Mahasiswa::with(['prodi'])->get();
            return DataTables::of($mhs)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button disabled onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.mahasiswa');
    }
}
