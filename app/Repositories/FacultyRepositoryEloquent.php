<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FacultyRepository;
use App\Entities\Faculty;
use App\Validators\FacultyValidator;

/**
 * Class FacultyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FacultyRepositoryEloquent extends BaseRepository implements FacultyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Faculty::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
