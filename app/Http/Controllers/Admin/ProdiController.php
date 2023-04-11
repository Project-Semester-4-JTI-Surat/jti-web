<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $prodi = Prodi::where('id','!=','2')->get();
            return DataTables::of($prodi)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.prodi');
    }
}
