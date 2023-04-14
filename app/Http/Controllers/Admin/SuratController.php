<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\JenisSurat;
use App\Models\Surat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class SuratController extends Controller
{
    public function getJenisSurat(Request $request)
    {
        if ($request->ajax()) {
            $jsurat = JenisSurat::all();
            return DataTables::of($jsurat)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<button onclick="edit(`'.$row->uuid.'`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.jenis-surat');
    }

    public function insertJenisSurat(Request $request)
    {
        $input = $request->only('keterangan');
        $spaceCount = substr_count($input['keterangan'],' ');
        $listString = explode(' ',$input['keterangan']);
        $strKode = "";
        for ($i=0; $i < count($listString); $i++) { 
            $strKode  .= mb_substr($listString[$i],0,1);
            // $strKode = explode(' ', mb_substr($listString[$i],0,1));
            // $strKode =  mb_substr($listString[$i],0,1);
        }
        $input += array('kode'=>$strKode);
        // dd($input);
        JenisSurat::create($input);
        return response()->json(['message'=>'success']);
    }

    public function getSurat(Request $request)
    {
        $id = $request->get('status');
        if ($request->ajax()) {
            $surat = Surat::with(['dosen','koordinator'])->where('status_id','=',$id)->get();
            return DataTables::of($surat)
            ->addIndexColumn()
            ->addColumn('aksi',function($row){
                return '<a href="'.route('admin.surat.detail',['id'=>$row->uuid]).'" class="btn btn-primary">Detail</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('admin.surat');
    }

    public function detail(Request $request, $id)
    {
        $surat = Surat::with(['dosen','koordinator'])->where('uuid','=',$id)->first();
        $anggota = Anggota::with('prodi')->where('surat_id','=',$id)->get();
        return view('admin.detail-surat',compact('surat','anggota'));
    }
}
