<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SectionRepository;
use App\Entities\Section;
use App\Validators\SectionValidator;

/**
 * Class SectionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SectionRepositoryEloquent extends BaseRepository implements SectionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Section::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
