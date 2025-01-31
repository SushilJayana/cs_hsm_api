<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ClassroomCriteria.
 *
 * @package namespace App\Criteria;
 */
class ClassroomCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->withoutTrashed();
        return $model;
    }
}
