<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\ClassroomCriteria;
use App\Criteria\SubjectCriteria;
use App\Repositories\ClassroomRepository;
use App\Repositories\SubjectRepository;
use App\Validators\ClassroomValidator;
use App\Validators\SubjectValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class SubjectController extends ApiBaseController
{
    protected $subjectRepository;
    protected $subjectValidator;
    protected $subjectCriteria;

    public function __construct(SubjectRepository $subjectRepository, SubjectValidator $subjectValidator, SubjectCriteria $subjectCriteria)
    {
        $this->subjectRepository = $subjectRepository;
        $this->subjectValidator = $subjectValidator;
        $this->subjectCriteria = $subjectCriteria;
        $this->subjectRepository->pushCriteria($this->subjectCriteria);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = $this->subjectRepository->all();
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
                $this->subjectValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->subjectRepository->create($request->all());
                return $this->respondWithMessage('Successfully created subject.', $payload);
            } catch (ValidatorException $exception) {
                return $this->respondWithError("Validator's Exception", $exception->getMessageBag());
            }
        } catch (\Exception $exception) {
            return $this->respondWithError( $exception->getMessage());
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
            $this->subjectValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $payload = $this->subjectRepository->update($request->all(), $id);
            return $this->respondWithMessage('Successfully updated subject.', $payload);
        } catch (\Exception $exception) {
              return $this->respondWithError( $exception->getMessage());
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
            $isDeleted = $this->subjectRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted subject.', $isDeleted);
        } catch (\Exception $exception) {
              return $this->respondWithError( $exception->getMessage());
        }
    }

}
