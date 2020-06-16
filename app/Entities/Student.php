<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Student.
 *
 * @package namespace App\Entities;
 */
class Student extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guard_name = 'api';
    protected $table = "hsm_students";

    protected $fillable = [
        'name', 'class_section_id', 'email', 'age', 'gender', 'photo', 'dob', 'nationality', 'address',
        'contact', 'guardian_name', 'guardian_contact', 'guardian_address', 'guardian_occupation', 'created_by', 'updated_by'
    ];

    public function classSection()
    {
        return $this->hasOne(ClassSection::class, 'id', 'class_section_id')->select(array('id', 'class_id', 'section_id'));
    }
}

