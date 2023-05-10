<?php

namespace App\Http\Controllers;

use App\Events\SuratBroadcast;
use App\Http\Requests\SuratInsertRequest;
use App\Models\Anggota;
use App\Models\Surat;
use App\Traits\ApiResponse;
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
        $count = count($request->get('nama_anggota'));
        $user_nim = Auth::user()->nim;
        $id = Surat::create([
            "kode_surat" => $input['kode_surat'],
            "dosen_id" => $input['dosen_id'],
            "prodi_id" => $input['prodi_id'],
            "kode_koordinator" => $input['koordinator_id'],
            "nama_mitra" => $input['nama_mitra'],
            "alamat_mitra" => $input['alamat_mitra'],
            "tanggal_dibuat" => $input['tanggal_dibuat'],
            "tanggal_pelaksanaan" => $input['tanggal_dibuat'],
            "tanggal_selesai" => $input['tanggal_selesai'],
            "kebutuhan" => $input['kebutuhan'],
            "keterangan" => $input['keterangan'],
            "judul_ta" => $input['judul_ta']
        ]);
        
        //cek jika mahasiswa yg bersangkutan individu
        if ($count == 1) {
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
        // event(new SuratBroadcast($request->get('kode_surat'),$request->get('nama_anggota')[0],$request->get('nim_anggota')[0]));
        return $this->successResponse('Surat berhasil diajukan');
        // return $this->successResponseData('data',$input);
    }
    public function detail($id)
    {
        $surat = Surat::with(['anggota', 'anggota.prodi'])->where('uuid', '=', $id)->get();
        return $this->successResponseData('Detail Surat', $surat);
        // return $this->responseCollection('Detail Surat',$surat);
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
