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

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id','id')->select(array('id', 'name'));

    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id')->select(array('id', 'name'));
    }
}
