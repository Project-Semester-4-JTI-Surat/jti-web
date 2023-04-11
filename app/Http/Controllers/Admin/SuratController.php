<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
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

    public function getSurat(Request $request, $id)
    {
        
    }
}
