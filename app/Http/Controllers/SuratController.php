<?php

namespace App\Http\Controllers;

use App\Events\SuratBroadcast;
use App\Http\Requests\SuratInsertRequest;
use App\Models\Anggota;
use App\Models\Surat;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Pusher\Pusher;

class SuratController extends Controller
{
    use ApiResponse;
    public function insert(Request $request)
    {
        // $input = $request->all();
        $input = $request->only([`kode_surat`, `status_id`, `dosen_id`, `kode_koordinator`, `nama_mitra`, `alamat_mitra`, `tanggal_dibuat`, `tanggal_pelaksanaan`, `tanggal_selesai`, `judul_ta`, `kebutuhan`, `keterangan`]);
        $count = count($request->get('nama_anggota'));
        $id = Surat::create([
            "kode_surat" => $request->get('kode_surat'),
            "dosen_id" => $request->get('dosen_id'),
            "kode_koordinator" => $request->get('koordinator_id'),
            "nama_mitra" => $request->get('nama_mitra'),
            "alamat_mitra" => $request->get('alamat_mitra'),
            "tanggal_dibuat" => $request->get('tanggal_dibuat'),
            "tanggal_pelaksanaan" => $request->get('tanggal_dibuat'),
            "tanggal_selesai" => $request->get('tanggal_selesai'),
            "kebutuhan" => $request->get('kebutuhan'),
            "keterangan" => $request->get('keterangan'),
            "judul_ta" => $request->get('judul_ta')
        ]);
        for ($i = 0; $i < $count; $i++) {
            Anggota::create(
                [
                    'surat_id' => $id->uuid,
                    'nama' => $request->get('nama_anggota')[$i],  
                    'nim' => $request->get('nim_anggota')[$i],
                    'no_hp' => $request->get('nohp_anggota')[$i],
                    'prodi_id' => $request->get('prodi_id_anggota')[$i],
                ]
            );
        }
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $data = array(
            'id'=>$id->uuid,
            'kode_surat'=>$request->get('kode_surat'),
            'nama_mhs'=>$request->get('nama_anggota')[0],
            'nim_mhs'=>$request->get('nim_anggota')[0],
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

