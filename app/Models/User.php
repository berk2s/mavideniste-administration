<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_branch_info(){
        return $this->hasOne(
          Branch::class,
          'branch_id',
          'user_branch'
        );;
    }

    public function user_authority(){
        return $this->belongsToMany(
            Pages::class,
            'user_authority',
            'user_id',
            'page_id'
        );
    }

    public function role(){
        return $this->hasOne(UserRoles::class,'role_id','user_role');
    }

    public function log(){
        return $this->hasMany(Log::class, 'user_id','user_id')->orderBy('log_id', 'DESC');;
    }
}
