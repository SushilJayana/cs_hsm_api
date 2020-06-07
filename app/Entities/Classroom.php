<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Classroom.
 *
 * @package namespace App\Entities;
 */
class Classroom extends Model implements Transformable
{
    use TransformableTrait,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name = 'api';
    protected $table = "hsm_classrooms";

    protected $fillable = [
        'name', 'slug', 'created_by', 'updated_by'
    ];

}
