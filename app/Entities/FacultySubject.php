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
class FacultySubject extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'api';
    protected $table = "hsm_faculty_subjects";

    protected $fillable = [
        'faculty_id', 'class_section_id','subject_id'
    ];

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class, 'class_section_id','id')->select(array('id'));

    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id','id')->select(array('id', 'name'));
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id','id')->select(array('id', 'name'));
    }
}
