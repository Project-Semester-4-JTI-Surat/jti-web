<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Surat
 *
 * @property string $uuid
 * @property string $kode_surat
 * @property int|null $status_id
 * @property string|null $dosen_id
 * @property string|null $kode_koordinator
 * @property int $prodi_id prodi mahasiswa yang melakukan pengajuan surat
 * @property string $metode_pengajuan
 * @property string|null $nama_mitra
 * @property string|null $alamat_mitra
 * @property string|null $tanggal_dibuat
 * @property string $tanggal_pelaksanaan
 * @property string|null $tanggal_selesai
 * @property string|null $judul_ta
 * @property string|null $kebutuhan
 * @property string|null $alasan_penolakan
 * @property string|null $keterangan
 * @property string|null $softfile_scan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Anggota> $anggota
 * @property-read int|null $anggota_count
 * @property-read \App\Models\Dosen|null $dosen
 * @property-read \App\Models\JenisSurat $jenis_surat
 * @property-read \App\Models\Koordinator|null $koordinator
 * @property-read \App\Models\Prodi $prodi
 * @property-read \App\Models\Status|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Surat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereAlamatMitra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereAlasanPenolakan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereDosenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereJudulTa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereKebutuhan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereKodeKoordinator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereKodeSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereMetodePengajuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereNamaMitra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereSoftfileScan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereTanggalDibuat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereTanggalPelaksanaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereTanggalSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Surat whereUuid($value)
 * @mixin \Eloquent
 */
class Surat extends Model
{
    use HasFactory, UUID;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $guarded = [];
    protected $table = 'surat';
    protected $hidden = [
        'dosen_id',
        'status_id',
        'kode_koordinator',
        'created_at',
        'updated_at'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id');
    }
    public function jenis_surat()
    {
        return $this->belongsTo(JenisSurat::class,'kode_surat');
    }

    public function koordinator()
    {
        return $this->belongsTo(Koordinator::class,'kode_koordinator');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class,'surat_id');
    }
}
