<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SuratExport;
use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Matrix\Builder;
use Yajra\DataTables\Facades\DataTables;

class RekapController extends Controller
{
    public function index(Request $request){
        $surat = Surat::with(['prodi'])->get();
        if ($request->ajax()){
            return DataTables::of($surat)
                ->addIndexColumn()
                ->addColumn('file_scan',function ($row){
                    $prodi = Prodi::find($row->prodi_id);
                    if (str_contains($prodi->keterangan, "TIF")) {
                        $prodi = 'TIF';
                    } elseif (str_contains($prodi->keterangan, "MIF")) {
                        $prodi = 'MIF';
                    } else {
                        $prodi = 'TKK';

                    }
                    return $row->softfile_scan != null ? '<a href="' .route('downloadSoftfile',['prodi'=>$prodi,'file'=>$row->softfile_scan]) . '"> File Scan </a>' : '-';

//                    return $row->softfile_scan == null ? '<a href=""> File Scan </a>' : ' ';
                })
                ->addColumn('detail',function ($row){
                    return '<button data-toggle="tooltip" data-placement="bottom" title="Detail pengajuan" class="btn btn-icon me-2 btn-primary" onclick="detail(`'.$row->uuid.'`)"><i class="fa-sharp fa-solid fa-circle-info"></i></button>';
                })
                ->rawColumns(['detail','file_scan'])
                ->make(true);
        }
        return view('admin.rekap');
    }

    public function export(Request $request)
    {
        $user = Auth::guard('admin')->user();
//        dd($request->only(['date'])['date'] != null);
        if ($request->only(['date'])['date'] != null){
            $input = $request->only(['date']);
            $date = explode(" - ", $input['date'], 2);
            $firstDate = Carbon::parse(trim($date[0], ' '))->format('Y-m-d');
            $secondDate = Carbon::parse(trim($date[1], ' '))->format('Y-m-d');
            return Excel::download(new SuratExport(prodi_id: $user->prodi_id, tanggal_awal: $firstDate, tanggal_akhir: $secondDate),'Data Pengajuan_'.$firstDate.'_'.$secondDate.'.xlsx');
        }else{
            return Excel::download(new SuratExport(prodi_id: $user->prodi_id, tanggal_awal: '', tanggal_akhir: ''),'Data Pengajuan.xlsx');
        }
    }
}
