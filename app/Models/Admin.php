<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable,UUID;
    protected $primaryKey = 'uuid';
    protected $guarded = [];
    protected $table = 'admin';
    protected $with = ['role'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function admin_prodi()
    {
        return $this->hasMany(AdminProdi::class,'admin_id');
    }

    //Otomatis enkripsi password sebelum disimpan di database
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value),
        );
    }

}
