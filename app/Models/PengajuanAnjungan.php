<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PengajuanAnjungan
 *
 * @property string $kode
 * @property string $kode_surat
 * @property string $mahasiswa_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan query()
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan whereKodeSurat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan whereMahasiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PengajuanAnjungan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PengajuanAnjungan extends Model
{
    use HasFactory;
    protected $table = "pengajuan_anjungan";
    protected $keyType = 'string';
    protected $guarded = [];
    protected $primaryKey = 'kode';
}
