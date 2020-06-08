<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClassSectionRepository;
use App\Entities\ClassSection;
use App\Validators\ClassSectionValidator;

/**
 * Class ClassSectionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClassSectionRepositoryEloquent extends BaseRepository implements ClassSectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClassSection::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
