<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\Koordinator;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KoordinatorController extends Controller
{
    public function index(Request $request)
    {
        $prodi = Prodi::where('id','!=','2')->get();
        $jsurat = JenisSurat::all();
        if ($request->ajax()) {
            $koordinator = Koordinator::with(['jenis_surat'])->where('nama','!=','-')->get();
            return DataTables::of($koordinator)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.koordinator',compact('prodi','jsurat'));
    }

    public function insert(Request $request)
    {
        $input = $request->only(['email','nama','no_hp','kode_surat','prodi_id']);
        Koordinator::create($input);
        return response()->json(['message'=>'success']);
    }

    function edit($id) {
        $koordinator = Koordinator::find($id);
        return response()->json(['message'=>'success','data'=>$koordinator]);
    }

    function update($id, Request $request) {
        $input = $request->only(['nama','no_hp','prodi','kode_surat','email']);
        // dd($input);
        $koordinator = Koordinator::find($id);
        $koordinator->update($input);
        return redirect()->back()->with('updateSuccess', 'true');
    }
}
