<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, hasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'phone',
        'address',
        'photo',
        'fcm',
        'position',
        'user_type',
        'customer_uuid',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model['uuid']          = Uuid::uuid4()->toString();
            $model['pass_access']   = str_pad(mt_rand(0, 99999), 4, 0, STR_PAD_LEFT);
            return $model;
        });

        self::updating(function ($model) {
            $model['pass_access'] = str_pad(mt_rand(0, 99999), 4, 0, STR_PAD_LEFT);
            return $model;
        });
    }
}
