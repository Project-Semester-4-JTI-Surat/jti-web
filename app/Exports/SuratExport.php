<?php

namespace App\Exports;

use App\Models\Surat;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratExport implements FromCollection,WithHeadings
{

    private $tanggal_akhir, $tanggal_awal,$role_id,$prodi_id;
    public function __construct($prodi_id,$tanggal_awal,$tanggal_akhir,$role_id = 1)
    {
        $this->role_id = $role_id;
        $this->prodi_id = $prodi_id;
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }

    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        /*
         * Cek jika role = 1(admin)
         * admin hanya bisa export data sesuai dengan prodi yang dia pegang
         *
         */
        if ($this->role_id == 1){
            if ($this->tanggal_awal && $this->tanggal_akhir){
                return DB::table('surat')
                    ->join('status', 'surat.status_id', '=', 'status.id')
                    ->join('prodi', 'surat.prodi_id', '=', 'prodi.id')
                    ->join('anggota','surat.uuid','=','anggota.surat_id')
                    ->where('surat.prodi_id','=',$this->prodi_id)
                    ->whereBetween('surat.tanggal_dibuat',[$this->tanggal_awal,$this->tanggal_akhir])
                    ->selectRaw('kode_surat ,status.keterangan as status ,prodi.keterangan as prodi,nama_mitra ,anggota.nama ,alamat_mitra ,tanggal_dibuat ,tanggal_pelaksanaan ,tanggal_selesai ,kebutuhan ,alasan_penolakan')
                    ->get();
            }else {
                return DB::table('surat')
                    ->join('status', 'surat.status_id', '=', 'status.id')
                    ->join('prodi', 'surat.prodi_id', '=', 'prodi.id')
                    ->join('anggota', 'surat.uuid', '=', 'anggota.surat_id')
                    ->where('surat.prodi_id','=',$this->prodi_id)
                    ->selectRaw('kode_surat ,status.keterangan as status ,prodi.keterangan as prodi,nama_mitra ,anggota.nama ,alamat_mitra ,tanggal_dibuat ,tanggal_pelaksanaan ,tanggal_selesai ,kebutuhan ,alasan_penolakan')
                    ->get();
            }
        }else{
            if ($this->tanggal_awal && $this->tanggal_akhir){
                return DB::table('surat')
                    ->join('status', 'surat.status_id', '=', 'status.id')
                    ->join('prodi', 'surat.prodi_id', '=', 'prodi.id')
                    ->join('anggota','surat.uuid','=','anggota.surat_id')
                    ->whereBetween('surat.tanggal_dibuat',[$this->tanggal_awal,$this->tanggal_akhir])
                    ->selectRaw('kode_surat ,status.keterangan as status ,prodi.keterangan as prodi,nama_mitra ,anggota.nama ,alamat_mitra ,tanggal_dibuat ,tanggal_pelaksanaan ,tanggal_selesai ,kebutuhan ,alasan_penolakan')
                    ->get();
            }else {
                return DB::table('surat')
                    ->join('status', 'surat.status_id', '=', 'status.id')
                    ->join('prodi', 'surat.prodi_id', '=', 'prodi.id')
                    ->join('anggota', 'surat.uuid', '=', 'anggota.surat_id')
                    ->selectRaw('kode_surat ,status.keterangan as status ,prodi.keterangan as prodi,nama_mitra ,anggota.nama ,alamat_mitra ,tanggal_dibuat ,tanggal_pelaksanaan ,tanggal_selesai ,kebutuhan ,alasan_penolakan')
                    ->get();
            }
        }
    }

    public function headings(): array
    {
        return [
            'Kode Surat',
            'Status',
            'Prodi',
            'Nama Mitra',
            'Mahasiswa pengaju',
            'Alamat Mitra',
            'Tanggal dibuat',
            'Tanggal Pelaksanaan',
            'Tanggal Selesai',
            'Kebutuhan',
            'Alasan Penolakan   '
        ];
    }
}
