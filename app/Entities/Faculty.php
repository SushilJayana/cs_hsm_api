<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Faculty.
 *
 * @package namespace App\Entities;
 */
class Faculty extends Model implements Transformable
{
    use TransformableTrait,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name = 'api';
    protected $table = "hsm_faculties";

    protected $fillable = [
        'name', 'salary', 'email', 'age', 'gender', 'photo', 'dob', 'nationality',
        'address', 'contact', 'guardian_name', 'guardian_contact', 'guardian_address',
        'guardian_occupation', 'created_by', 'updated_by'
    ];
}

