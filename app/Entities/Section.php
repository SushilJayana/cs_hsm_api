<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Section.
 *
 * @package namespace App\Entities;
 */
class Section extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name = 'api';
    protected $table = "hsm_sections";

    protected $fillable = [
        'name', 'slug', 'created_by', 'updated_by'
    ];


}
