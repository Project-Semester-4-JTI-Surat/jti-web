<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\sendEmailJob;
use App\Mail\TolakPengajuan;
use App\Models\Anggota;
use App\Models\JenisSurat;
use App\Models\Mahasiswa;
use App\Models\Surat;
use App\Traits\PrintKodeSurat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SuratController extends Controller
{
    use PrintKodeSurat;

    public function getJenisSurat(Request $request)
    {
        if ($request->ajax()) {
            $jsurat = JenisSurat::where('kode', '!=', 'DASH')->get();
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
            $strKode .= mb_substr($listString[$i], 0, 1);
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
        //id =  2
        //ambil surat sesuai dengan admin prodi..
        $user = Auth::guard('admin')->user();
        $surat = '';
        /**
         * Experimental Features
         * Masih ada bug yg belum terselesaikan..
         */
        //Cek Jika role Admin adalah super admin
        // dd($user->role_id);
        if ($user->role_id == '2') {
            $surat = Surat::with(['dosen', 'koordinator', 'prodi'])->where('status_id', '=', $id)->get();
            // dd($surat);

        } else {
            //Cek jika admin prodi mengampu 2 prodi
            $surat = Surat::with(['dosen', 'koordinator', 'prodi'])->where('status_id', '=', $id)->where('prodi_id', '=', $user->prodi_id)->get();
        }
        if ($request->ajax()) {
            // $surat = $surat->get();
            return DataTables::of($surat)
                ->addIndexColumn()
                ->addColumn('softfile', function ($row) {
                    return $row->softfile_scan != null ? '<a href="' .Storage::url( $row->softfile_scan). '"> File Scan </a>' : '-';
                    // return '<a href="' . env('APP_URL') . '/assets/softfile/' . $row->softfile_scan . '"> File Scan </a>';
                })
                ->addColumn('status', function ($row) {
                    switch ($row->status_id) {
                        case '1':
                            return '
                        <span class="badge bg-primary">Menunggu Diproses</span>
                        ';
                            break;
                        case '2':
                            return '
                        <span class="badge bg-primary">Diproses </span>
                        ';
                            break;
                        case '3':
                            return '
                            <span class="badge bg-success">Dapat Diambil </span>
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
                ->addColumn('print', function ($row) {
                    return '<a target="_blank" href="' . route('admin.surat.print', ['id' => $row->uuid]) . '" class="btn btn-info">Print</a>';
                })
                ->rawColumns(['aksi', 'print', 'status', 'softfile'])
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

    public function surat_selesai($id)
    {
        $surat = Surat::find($id);
        $surat->status_id = 1;
        $surat->update();
        return redirect()->route('admin.surat.index', ['status' => 1]);
    }

    public function tolak_surat(Request $request, $id)
    {
        $surat = Surat::find($id);
        $anggota = Anggota::where('surat_id', '=', $id)->first();
        $mhs = Mahasiswa::where('nim', '=', $anggota->nim)->first();
        $data = [
            'email' => $mhs->email,
            'alasan_penolakan' => $request->get('alasan_penolakan'),
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

    public function softfile_save(Request $request, $id)
    {
        $surat = Surat::find($id);
        $now = Carbon::now()->format('d-m-Y');
        $pengaju = Anggota::where('surat_id', '=', $surat->uuid)->first();
        $softfile = $request->get('softfile');
        $tempExt = pathinfo(storage_path('public/') . $softfile, PATHINFO_EXTENSION);
        $filename = $surat->kode_surat . '_' . $now . '_' . $pengaju->nim . '.' . $tempExt;
//        dd($filename);
        if (str_contains($surat->prodi->keterangan, "TIF")) {
            $prodi = 'TIF';
            Storage::move("public/" . $softfile, "public/TIF/" . $filename);
//            rename(storage_path('public/'). $softfile, storage_path('public/TIF/') . $filename);
        } elseif (str_contains($surat->prodi->keterangan, "MIF")) {
            $prodi = 'MIF';
//            rename(storage_path('public/'). $softfile, storage_path('public/MIF/') . $filename);
            Storage::move("public/" . $softfile, "public/MIF/" . $filename);
        } else {
            $prodi = 'TKK';
//            rename(storage_path('public/'). $softfile, storage_path('public/TKK/') . $filename);
            Storage::move("public/" . $softfile, "public/TKK/" . $filename);

        }
//        dd($softfile);
        $surat->softfile_scan = $prodi . '/' . $filename;
        $surat->status_id = 4;
        $surat->update();
        return redirect()->route('admin.surat.index', ['status' => 4]);
    }

    public function print($id)
    {
        $surat = Surat::with(['prodi', 'koordinator', 'dosen'])->where('uuid', '=', $id)->first();
        $anggota = Anggota::where('surat_id', '=', $id)->get();
        if ($surat->kode_surat == 'TA') {
            $anggota = Anggota::where('surat_id', '=', $id)->first();
        }
//         dd($anggota);
        return view('template-surat.' . $surat->kebutuhan . '.' . $surat->kode_surat, compact('surat', 'anggota'));
        // return $this->$surat->kode_surat();
        // $pdf = PDF::loadView('template-surat.'.$surat->kode_surat);
        // return $pdf->stream();
    }

    public function scanQr($id)
    {
        //ambil surat sesuai dengan id yg dikirim
        $surat = Surat::find($id);
        $anggota = Anggota::where('surat_id', '=', $id)->first();
        return view('detail-surat', compact('surat', 'anggota'));
    }
}
