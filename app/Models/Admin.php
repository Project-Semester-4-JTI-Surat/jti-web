<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Admin
 *
 * @property string $uuid
 * @property string|null $username
 * @property string|null $nama
 * @property string $jk
 * @property int $role_id
 * @property int $prodi_id
 * @property string $change_password
 * @property string $password
 * @property string $no_hp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AdminProdi> $admin_prodi
 * @property-read int|null $admin_prodi_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Prodi $prodi
 * @property-read \App\Models\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereChangePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereProdiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUuid($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable,UUID;
    protected $primaryKey = 'uuid';
    protected $guarded = [];
    protected $table = 'admin';
    protected $with = ['role','prodi','admin_prodi'];
    protected $hidden = [
        'password',
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
