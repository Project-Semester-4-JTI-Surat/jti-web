<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailJob;
use App\Mail\TolakPengajuan;
use App\Models\Anggota;
use App\Models\JenisSurat;
use App\Models\Mahasiswa;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                ->addColumn('aksi', function ($row) {
                    return '<button onclick="edit(`' . $row->uuid . '`)" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('admin.jenis-surat');
    }

    public function insertJenisSurat(Request $request)
    {
        $input = $request->only('keterangan');
        $spaceCount = substr_count($input['keterangan'], ' ');
        $listString = explode(' ', $input['keterangan']);
        $strKode = "";
        for ($i = 0; $i < count($listString); $i++) {
            $strKode  .= mb_substr($listString[$i], 0, 1);
            // $strKode = explode(' ', mb_substr($listString[$i],0,1));
            // $strKode =  mb_substr($listString[$i],0,1);
        }
        $input += array('kode' => $strKode);
        // dd($input);
        JenisSurat::create($input);
        return response()->json(['message' => 'success']);
    }

    public function getSurat(Request $request)
    {
        $id = $request->get('status');
        if ($request->ajax()) {
            $surat = Surat::with(['dosen', 'koordinator'])->where('status_id', '=', $id)->get();
            return DataTables::of($surat)
                ->addIndexColumn()
                ->addColumn('softfile',function($row){
                    return '<a href="'.env('APP_URL').'/assets/softfile/'.$row->softfile_scan.'"> File Scan </a>';
                })
                ->addColumn('status', function ($row) {
                    switch ($row->status_id) {
                        case '2':
                            return '
                        <span class="badge bg-primary">Menunggu Diproses</span>
                        ';
                            break;
                        case '3':
                            return '
                        <span class="badge bg-primary">Diproses <div class="spinner-border spinner-border-sm" role="status"></div></span>
                        ';
                            break;
                        case '4':
                            return '
                            <span class="badge bg-success">Dapat Diambil <div class="spinner-border spinner-border-sm" role="status"></div></span>
                            ';
                            break;
                        case '5':
                            return '
                                <span class="badge bg-danger">Surat Ditolak</span>
                                ';
                            break;

                        default:
                            return '
                    <span class="badge bg-success">Selesai</span>
                    ';
                            break;
                    }
                })
                ->addColumn('aksi', function ($row) {
                    return '<a href="' . route('admin.surat.detail', ['id' => $row->uuid]) . '" class="btn btn-primary">Detail</a>';
                })
                ->rawColumns(['aksi', 'status','softfile'])
                ->make(true);
        }
        return view('admin.surat');
    }

    public function detail(Request $request, $id)
    {
        $surat = Surat::with(['dosen', 'koordinator'])->where('uuid', '=', $id)->first();
        $anggota = Anggota::with('prodi')->where('surat_id', '=', $id)->get();
        return view('admin.detail-surat', compact('surat', 'anggota'));
    }

    public function proses_surat($id)
    {
        $surat = Surat::find($id);
        $surat->status_id = 3;
        $surat->update();
        return redirect()->route('admin.surat.index', ['status' => 3]);
    }

    public function tolak_surat(Request $request, $id)
    {
        $surat = Surat::find($id);
        $anggota = Anggota::where('surat_id','=',$id)->first();
        $mhs = Mahasiswa::where('nim','=',$anggota->nim)->first();
        $data = [
            'email'=>$mhs->email,
            'alasan_penolakan'=>$request->get('alasan_penolakan'),
        ];
        $surat->status_id = 5;
        $surat->alasan_penolakan = $request->get('alasan_penolakan');
        $surat->update();
        dispatch(new sendEmailJob($data));
        // Mail::to($mhs->email)->send(new TolakPengajuan($mhs->email,$request->get('alasan_penolakan')));
        return redirect()->route('admin.surat.index', ['status' => 5]);    
    }
    public function dapat_diambil($id)
    {
        $surat = Surat::find($id);
        $surat->status_id = 4;
        $surat->update();
        return redirect()->route('admin.surat.index', ['status' => 4]);
    }

    public function softfile_save(Request $request,$id)
    {
        $softfile = $request->get('softfile');
        $tempExt = pathinfo(public_path('assets/img/temp/') .$softfile, PATHINFO_EXTENSION);
        $filename = $id . '.' . $tempExt;
        rename(public_path('assets/temp/') . $softfile, public_path('assets/softfile/') . $filename);
        $surat = Surat::find($id);
        $surat->softfile_scan = $filename;
        $surat->update();
        return redirect()->route('admin.surat.index', ['status' => 4]);
    }
}