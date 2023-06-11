<?php

namespace App\Http\Controllers;

use App\Events\SuratBroadcast;
use App\Http\Requests\SuratInsertRequest;
use App\Models\Anggota;
use App\Models\Dosen;
use App\Models\JenisSurat;
use App\Models\Koordinator;
use App\Models\Prodi;
use App\Models\Surat;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class SuratController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $auth = Auth::user();
        $get_anggota = Anggota::join('surat', 'surat_id', 'surat.uuid')->join('status', 'status_id', 'status.id')->where('anggota.nama', '=', $auth->nama)->get(['surat.uuid', 'surat.kode_surat', 'status.keterangan']);
        // $surat = Surat::where()->with(['status'])->get();
        return $this->responseCollection('Surat Saya', $get_anggota);
    }
    public function insert(Request $request)
    {
        // $input = $request->all();
        $input = $request->only([`kode_surat`, `status_id`,'prodi_id', `dosen_id`, `kode_koordinator`, `nama_mitra`, `alamat_mitra`, `tanggal_dibuat`, `tanggal_pelaksanaan`, `tanggal_selesai`, `judul_ta`, `kebutuhan`, `keterangan`]);
        // dd($input);
        $now = Carbon::now()->format('Y-m-d');
        $count = count($request->get('nama_anggota'));
        if ($request->has('web')) {
            $user_nim = Auth::guard('mahasiswa')->user()->nim;
        }else{
            $user_nim = Auth::user()->nim;
        }

        $arr = array(
                "kode_surat" => $input['kode_surat'],
                // "dosen_id" => $request->has('dosen_id') ?? $input['dosen_id'],
                "prodi_id" => $input['prodi_id'],
                // "kode_koordinator" => $request->has('koordinator_id') == '' ?? $input['koordinator_id'],
                "nama_mitra" => $input['nama_mitra'],
                "alamat_mitra" => $input['alamat_mitra'],
                "tanggal_dibuat" => $now,
                "tanggal_pelaksanaan" => $input['tanggal_pelaksanaan'],
                "tanggal_selesai" => $input['tanggal_selesai'],
                "kebutuhan" => $input['kebutuhan'],
                "keterangan" => $input['keterangan'],
        );
        if ( $request->has('koordinator_id')) $arr += array("kode_koordinator" => $input['koordinator_id'],);
        if ( $request->has('dosen_id')) $arr += array("dosen_id" => $input['dosen_id']);
        if ( $request->has('judul_ta')) $arr += array("judul_ta" => $input['judul_ta']);
      
        // dd($arr);
        $id = Surat::create($arr);
        // dd($count);
        
        //cek jika mahasiswa yg bersangkutan individu
        if ($count == 1) {
            $prodi = Prodi::where('keterangan','=',$request->get('prodi_id_anggota')[0])->first();
            Anggota::create(
                [
                    'surat_id' => $id->uuid,
                    'individu' => 'true',
                    'ketua'=>'false',
                    'nama' => $request->get('nama_anggota')[0],
                    'nim' => $request->get('nim_anggota')[0],
                    'no_hp' => $request->get('nohp_anggota')[0],
                    'prodi_id' => $request->get('prodi_id_anggota')[0],
                ]
            );
        } else {
            for ($i = 0; $i < $count; $i++) {
                $array_field = array(
                    'surat_id' => $id->uuid,
                    'nama' => $request->get('nama_anggota')[$i],
                    'nim' => $request->get('nim_anggota')[$i],
                    'no_hp' => $request->get('nohp_anggota')[$i],
                    'prodi_id' => $request->get('prodi_id_anggota')[$i],
                );
                
                //cek nim mahasiswa(mahasiswa yg login otomatis menjadi ketua kelompok)
                if ($request->get('nim_anggota')[$i] == $user_nim) {
                    $array_field += array(
                        'ketua'=>'true' //untuk field ketua.. Komentar tersedia di database
                    );
                }else{
                    $array_field += array(
                        'ketua'=>'false' //untuk field ketua.. Komentar tersedia di database
                    );
                }
                Anggota::create(
                   $array_field
                );
            }
        }
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $data = array(
            'id' => $id->uuid,
            'kode_surat' => $request->get('kode_surat'),
            'nama_mhs' => $request->get('nama_anggota')[0],
            'nim_mhs' => $request->get('nim_anggota')[0],
        );
        $pusher->trigger(
            'my-channel',
            'my-event',
            $data
        );
        if ($request->has('web')) {
            return redirect()->route('mahasiswa.dashboard');
        }
        // event(new SuratBroadcast($request->get('kode_surat'),$request->get('nama_anggota')[0],$request->get('nim_anggota')[0]));
        return $this->successResponse('Surat berhasil diajukan');
        // return $this->successResponseData('data',$input);
    }
    public function detail($id)
    {
        $surat = Surat::with(['anggota', 'anggota.prodi','dosen','koordinator'])->where('uuid', '=', $id)->get();
        return $this->successResponseData('Detail Surat', $surat);
        // return $this->responseCollection('Detail Surat',$surat);
    }
    
    public function pengajuan_surat()
    {
        $auth = Auth::guard('mahasiswa')->user();
        $jsurat = JenisSurat::where('kode','!=','DASH')->get();
        $dosen = Dosen::where('nama','!=','-')->where('prodi_id','=',$auth->prodi_id)->get();
        $koordinator = Koordinator::where('nama','!=','-')->where('prodi_id','=',$auth->prodi_id)->get();
        $prodi = Prodi::where('id','!=','2')->get();
        return view('mahasiswa.pengajuan-surat',compact('jsurat','dosen','koordinator','prodi'));
    }

    public function detail_surat($id)
    {
        $surat = Surat::with(['dosen', 'koordinator', 'prodi','jenis_surat'])->where('uuid', '=', $id)->first();
        return view('mahasiswa.detail-surat',compact('surat'));
    }

    public function apiSuratInsert(Request $request)
    {
        $input = $request->only([`kode_surat`, `status_id`,'prodi_id', `dosen_id`, `kode_koordinator`, `nama_mitra`, `alamat_mitra`, `tanggal_dibuat`, `tanggal_pelaksanaan`, `tanggal_selesai`, `judul_ta`, `kebutuhan`, `keterangan`]);
        $jenisSurat = JenisSurat::where('keterangan','=',$request->kode_surat)->first();
        $dosen = Dosen::where('nama','=',$request->dosen)->first();
        $koordinator = Koordinator::where('nama','=',$request->koordinator)->first();
        $prodi = Prodi::where('keterangan','=',$request->prodi)->first();
        // dd($input);
        $now = Carbon::now()->format('Y-m-d');
        if ($request->has('web')) {
            $user_nim = Auth::guard('mahasiswa')->user()->nim;
        }else{
            $user_nim = Auth::user()->nim;
        }

        $arr = array(
                "kode_surat" => $jenisSurat->kode,
                // "dosen_id" => $request->has('dosen_id') ?? $input['dosen_id'],
                "prodi_id" => $prodi->id,
                // "kode_koordinator" => $request->has('koordinator_id') == '' ?? $input['koordinator_id'],
                "nama_mitra" => $input['nama_mitra'],
                "alamat_mitra" => $input['alamat_mitra'],
                "tanggal_dibuat" => $now,
                "tanggal_pelaksanaan" => $input['tanggal_pelaksanaan'],
                "tanggal_selesai" => $input['tanggal_selesai'],
                "kebutuhan" => $input['kebutuhan'],
                "keterangan" => $input['keterangan'],
        );
        if ( $koordinator) $arr += array("kode_koordinator" => $koordinator->uuid);
        if ($dosen) $arr += array("dosen_id" => $dosen->uuid);
        if ( $request->has('judul_ta')) $arr += array("judul_ta" => $input['judul_ta']);
      
        // dd($arr);
        $surat = Surat::create($arr);
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $data = array(
            'id' => $surat->uuid,
            'kode_surat' => $request->get('kode_surat'),
            'nama_mhs' => '',
            'nim_mhs' => '',
        );
        $pusher->trigger(
            'my-channel',
            'my-event',
            $data
        );
        return $this->successResponseData('Surat berhasil diajukan', $surat->uuid);
    }

    public function apiAnggotaInsert(Request $request,$id)
    {
        $auth = Auth::user();
        $field =  [
            'surat_id' => $id,
            'individu' => 'false',
            'nama' => str_replace('\"',"",$request->get('nama_anggota'),$count),
            'nim' => str_replace('\"',"",$request->get('nim_anggota'),$count),
            'no_hp' => str_replace('\"',"", $request->get('nohp_anggota'),$count),
            'prodi_id' => (int)str_replace('\"',"",$request->get('prodi_id_anggota'),$count),
        ];
        if($request->get('nama_anggota') == $auth->nama) $field += array('ketua'=>'true');
        // return $this->successResponseData("kontol",$field['nama']);
        Anggota::create($field);
        return $this->successResponse('Surat berhasil diajukan');
    }


}
/**
 * $array = ['nim_anggota][i]
 * 
 * $array = [
 * 
 *  ]
 */

//  $array = [
//     'identitas'=>'1',
//     'sub'=>[
//         'sub1' => 1,
//     ],
// ];
// echo $array['identitas'];
