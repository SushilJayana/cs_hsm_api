<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ClassSectionValidator.
 *
 * @package namespace App\Validators;
 */
class ClassSectionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "class_id" => ["required", "numeric"],
            "section_id" => ["required", "numeric"],
        ],
        ValidatorInterface::RULE_UPDATE => [
            "class_id" => ["required", "numeric"],
            "section_id" => ["required", "numeric"],
        ],
    ];
}
