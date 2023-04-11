<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratInsertRequest;
use App\Models\Anggota;
use App\Models\Surat;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

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
        return $this->successResponse('Surat berhasil diajukan');
    }
}
