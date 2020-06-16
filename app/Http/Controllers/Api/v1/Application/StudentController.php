<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\StudentCriteria;
use App\Repositories\StudentRepository;
use App\Validators\StudentValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class StudentController extends ApiBaseController
{
    protected $studentRepository;
    protected $studentValidator;
    protected $studentCriteria;

    public function __construct(StudentRepository $studentRepository, StudentValidator $studentValidator, StudentCriteria $studentCriteria)
    {
        $this->studentRepository = $studentRepository;
        $this->studentValidator = $studentValidator;
        $this->studentCriteria = $studentCriteria;
        $this->studentRepository->pushCriteria($this->studentCriteria);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $data = DB::table('hsm_students')
            ->join('hsm_classroom_section_relation', 'hsm_classroom_section_relation.id', '=', 'hsm_students.class_section_id')
            ->join('hsm_classrooms', 'hsm_classrooms.id', '=', 'hsm_classroom_section_relation.class_id')
            ->join('hsm_sections', 'hsm_sections.id', '=', 'hsm_classroom_section_relation.section_id')
            ->select('hsm_students.*', 'hsm_classrooms.name as classroom', 'hsm_sections.name as section')
            ->paginate();
//        $data = $this->studentRepository->with(['classSection', 'classSection.classroom', 'classSection.section'])->paginate($limit = 2, $columns = ['*']);
        return $this->respondWithMessage('payload', $data);
    }

    /**payload
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        try {
            try {
                $this->studentValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $payload = $this->studentRepository->create($request->all());
                return $this->respondWithMessage('Successfully created student.', $payload);
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
                $this->studentValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $payload = $this->studentRepository->update($request->all(), $id);
                return $this->respondWithMessage('Successfully updated student.', $payload);
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
            $isDeleted = $this->studentRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted student.', $isDeleted);
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
        }
    }

}
