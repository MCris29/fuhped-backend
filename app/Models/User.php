<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_PARTNER = 'ROLE_PARTNER';
    const ROLE_AFFILIATE = 'ROLE_AFFILIATE';
    const ROLE_USER = 'ROLE_USER';

    private const ROLES_HIERARCHY = [
        self::ROLE_SUPER_ADMIN => [self::ROLE_ADMIN],
        self::ROLE_ADMIN => [self::ROLE_PARTNER],
        self::ROLE_PARTNER => [self::ROLE_AFFILIATE],
        self::ROLE_AFFILIATE => [],
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function received()
    {
        return $this->hasMany('App\Models\Notification', 'receiver_id');
    }

    public function sent()
    {
        return $this->hasMany('App\Models\Notification', 'transmitter_id');
    }

    public function isGranted($role)
    {
        if ($role === $this->role) {
            return true;
        }
        return self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$this->role]);
    }

    private static function isRoleInHierarchy($role, $role_hierarchy)
    {
        if (in_array($role, $role_hierarchy)) {
            return true;
        }
        foreach ($role_hierarchy as $role_included) {
            if (self::isRoleInHierarchy($role, self::ROLES_HIERARCHY[$role_included])) {
                return true;
            }
        }
        return false;
    }
}
