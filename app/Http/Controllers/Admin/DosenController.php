<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $prodi = Prodi::where('id','!=','2')->get();
        if ($request->ajax()) {
            $mhs = Dosen::with(['prodi'])->get();
            return DataTables::of($mhs)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.dosen',compact('prodi'));
    }

    public function insert(Request $request)
    {
        $input = $request->only(['nama','nip','prodi_id']);
        Dosen::create($input);
        return response()->json(['message'=>'success']);
    }
}
