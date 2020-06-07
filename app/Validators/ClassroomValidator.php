<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClassroomValidator.
 *
 * @package namespace App\Validators;
 */
class ClassroomValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "name" => ["required"],
            "slug" => ["required"],
            "created_by" => ["required", "numeric"],
        ],
        ValidatorInterface::RULE_UPDATE => [
            "name" => ["sometimes","required"],
            "slug" => ["sometimes","required"],
            "updated_by" => ["required","numeric"],
        ],
    ];
}
