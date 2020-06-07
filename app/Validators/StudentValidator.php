<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class StudentValidator.
 *
 * @package namespace App\Validators;
 */
class StudentValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "name" => ["required"],
            "class_section_id" => ["required"],
            "gender" => ["required"],
            "address" => ["required"],
            "contact" => ["required", "numeric"],
            "guardian_name" => ["required"],
            "guardian_contact" => ["required", "numeric"],
            "guardian_address" => ["required"],
            "created_by" => ["required", "numeric"],
        ],
        ValidatorInterface::RULE_UPDATE => [
            "name" => ["sometimes", "required"],
            "class_section_id" => ["sometimes", "required"],
            "gender" => ["sometimes", "required"],
            "address" => ["sometimes", "required"],
            "contact" => ["sometimes", "required", "numeric"],
            "guardian_name" => ["sometimes", "required"],
            "guardian_contact" => ["sometimes", "required", "numeric"],
            "guardian_address" => ["sometimes", "required"],
            "updated_by" => ["required", "numeric"],
        ],
    ];
}
