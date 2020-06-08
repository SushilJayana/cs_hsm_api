<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ClassSection.
 *
 * @package namespace App\Entities;
 */
class ClassSection extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'api';
    protected $table = "hsm_classroom_section_relation";

    protected $fillable = [
        'class_id', 'section_id'
    ];

}
