<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\ClassroomCriteria;
use App\Repositories\ClassroomRepository;
use App\Validators\ClassroomValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class SectionController extends ApiBaseController
{
    protected $sectionRepository;
    protected $sectionValidator;
    protected $sectionCriteria;

    public function __construct(ClassroomRepository $sectionRepository, ClassroomValidator $sectionValidator, ClassroomCriteria $sectionCriteria)
    {
        $this->sectionRepository = $sectionRepository;
        $this->sectionValidator = $sectionValidator;
        $this->sectionCriteria = $sectionCriteria;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $data = $this->sectionRepository->all();
        return $this->respondWithMessage('payload', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        try {
            try {
                $this->sectionValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->sectionRepository->create($request->all());
                return $this->respondWithMessage('Successfully created section.', $payload);
            } catch (ValidatorException $exception) {
                return $this->respondWithError("Validator's Exception", $exception->getMessageBag());
            }
        } catch (\Exception $exception) {
            return $this->respondWithError("Exception", $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        try {
            $this->sectionValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $payload = $this->sectionRepository->update($request->all(), $id);
            return $this->respondWithMessage('Successfully updated section.', $payload);
        } catch (\Exception $exception) {
            return $this->respondWithError("Exception", $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        try {
            $isDeleted = $this->sectionRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted section.', $isDeleted);
        } catch (\Exception $exception) {
            return $this->respondWithError("Exception", $exception->getMessage());
        }
    }

}
