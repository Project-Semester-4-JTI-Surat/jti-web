<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
