<?php

namespace App\Entities;

use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait,HasRoles,HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *`
     * @var array
     */

    protected $guard_name = 'api';
    protected $table = "hsm_users";

    protected $fillable = [
        'username', 'email', 'password',
        'name', 'age', 'gender', 'photo', 'dob', 'nationality','address','contact',
        'guardian_name','guardian_contact', 'guardian_occupation',
        'created_by', 'updated_by'
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
}



