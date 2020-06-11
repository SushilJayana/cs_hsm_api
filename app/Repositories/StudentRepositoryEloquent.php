<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StudentRepository;
use App\Entities\Student;
use App\Validators\StudentValidator;

/**
 * Class StudentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StudentRepositoryEloquent extends BaseRepository implements StudentRepository
{

    /**
     * @var array
     */
//    protected $fieldSearchable = [
//        'class_section_id'
//    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Student::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
