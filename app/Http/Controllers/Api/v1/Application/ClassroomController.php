<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\ClassroomCriteria;
use App\Repositories\ClassroomRepository;
use App\Validators\ClassroomValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class ClassroomController extends ApiBaseController
{
    protected $classroomRepository;
    protected $classroomValidator;
    protected $classroomCriteria;

    public function __construct(ClassroomRepository $classroomRepository, ClassroomValidator $classroomValidator, ClassroomCriteria $classroomCriteria)
    {
        $this->classroomRepository = $classroomRepository;
        $this->classroomValidator = $classroomValidator;
        $this->classroomCriteria = $classroomCriteria;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $data = $this->classroomRepository->all();
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
                $this->classroomValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->classroomRepository->create($request->all());
                return $this->respondWithMessage('Successfully created classroom.', $payload);
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
            $this->classroomValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $payload = $this->classroomRepository->update($request->all(), $id);
            return $this->respondWithMessage('Successfully updated classroom.', $payload);
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
            $isDeleted = $this->classroomRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted classroom.', $isDeleted);
        } catch (\Exception $exception) {
            return $this->respondWithError("Exception", $exception->getMessage());
        }
    }

}
