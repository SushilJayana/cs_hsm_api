<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            "name" => ["required"],
            "username" => ["required"],
            "email" => ["required"],
            "password" => ["required"],
            "age" => ["required", "numeric"],
            "gender" => ["required"],
            "nationality" => ["required"],
            "address" => ["required"],
            "contact" => ["required", "numeric"],
            "guardian_name" => ["required"],
            "user_type" => ["required"],
        ],
        ValidatorInterface::RULE_UPDATE => ["name" => ["required"],
            "username" => ["required"],
            "email" => ["required"],
            "password" => ["required"],
            "age" => ["required", "numeric"],
            "gender" => ["required"],
            "nationality" => ["required"],
            "address" => ["required"],
            "contact" => ["required", "numeric"],
            "guardian_name" => ["required"],
            "user_type" => ["required"],
        ],
    ];
}

