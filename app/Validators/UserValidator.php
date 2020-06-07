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
            "username" => ["required", "unique:hsm_users"],
            "email" => ["required", "email"],
            "password" => ["required"],
            "address" => ["required"],
            "contact" => ["required", "numeric"],
            "user_type" => ["required"],
            "created_by" => ["required", "numeric"],
        ],
        ValidatorInterface::RULE_UPDATE => [
            "name" => ["sometimes", "required"],
            "username" => ["sometimes", "required"],
            "email" => ["sometimes", "required", "email"],
            "password" => ["sometimes", "required"],
            "address" => ["sometimes", "required"],
            "contact" => ["sometimes", "required", "numeric"],
            "user_type" => ["sometimes", "required"],
            "updated_by" => ["required", "numeric"],
        ],
    ];
}

