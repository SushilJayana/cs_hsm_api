<?php


namespace App\Http\Controllers\Api\v1\Application;


use App\Http\Controllers\Api\v1\Shared\ApiBaseController;
use App\Repositories\ClassSectionRepository;

use App\Validators\ClassSectionValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ClassSectionController extends ApiBaseController
{

    protected $classSectionRepository;
    protected $classSectionValidator;

    public function __construct(ClassSectionRepository $classSectionRepository, ClassSectionValidator $classSectionValidator)
    {
        $this->classSectionRepository = $classSectionRepository;
        $this->classSectionValidator = $classSectionValidator;
    }

    public function save(Request $request)
    {
        try {
            try {
                $this->classSectionValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->classSectionRepository->create($request->all());
                return $this->respondWithMessage('Successfully added section to class.', $payload);
            } catch (ValidatorException $exception) {
                return $this->respondWithError("Validator's Exception", $exception->getMessageBag());
            }
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
        }

    }
}
