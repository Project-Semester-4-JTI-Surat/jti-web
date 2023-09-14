<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdminProdi
 *
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Prodi $prodi
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProdi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProdi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminProdi query()
 * @mixin \Eloquent
 */
class AdminProdi extends Model
{
    use HasFactory;
    protected $table = 'admin_prodi';

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id');
    }
    
}
