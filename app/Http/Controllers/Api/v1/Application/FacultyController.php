<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\FacultyCriteria;
use App\Repositories\FacultyRepository;
use App\Validators\FacultyValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class FacultyController extends ApiBaseController
{
    protected $facultyRepository;
    protected $facultyValidator;
    protected $facultyCriteria;

    public function __construct(FacultyRepository $facultyRepository, FacultyValidator $facultyValidator, FacultyCriteria $facultyCriteria)
    {
        $this->facultyRepository = $facultyRepository;
        $this->facultyValidator = $facultyValidator;
        $this->facultyCriteria = $facultyCriteria;
        $this->facultyRepository->pushCriteria($this->facultyCriteria);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $data = $this->facultyRepository->all();
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
                $this->facultyValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->facultyRepository->create($request->all());
                return $this->respondWithMessage('Successfully created faculty.', $payload);
            } catch (ValidatorException $exception) {
                return $this->respondWithError("Validator's Exception", $exception->getMessageBag());
            }
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
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
            try {
                $this->facultyValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $payload = $this->facultyRepository->update($request->all(), $id);
                return $this->respondWithMessage('Successfully updated faculty.', $payload);
            } catch (ValidatorException $exception) {
                return $this->respondWithError("Validator's Exception", $exception->getMessageBag());
            }
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
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
            $isDeleted = $this->facultyRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted student.', $isDeleted);
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
        }
    }

}
