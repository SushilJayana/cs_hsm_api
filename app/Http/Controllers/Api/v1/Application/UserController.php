<?php

namespace App\Http\Controllers\Api\v1\Application;

use App\Criteria\UserCriteria;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Api\v1\Shared\ApiBaseController;


class UserController extends ApiBaseController
{
    protected $userRepository;
    protected $userValidator;
    protected $userCriteria;

    public function __construct(UserRepository $userRepository, UserValidator $userValidator, UserCriteria $userCriteria)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
        $this->userCriteria = $userCriteria;
        $this->userRepository->pushCriteria($this->userCriteria);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $data = $this->userRepository->all();
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
                $this->userValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
                $request['password'] = Hash::make($request->password);
                $payload = $this->userRepository->create($request->all());
                if ($payload) $payload->assignRole($request->user_type);
                return $this->respondWithMessage('Successfully created user.', $payload);
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
                $this->userValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
                $request['password'] = ($request->password) ? Hash::make($request->password) : "";
                $payload = $this->userRepository->update($request->all(), $id);
                return $this->respondWithMessage('Successfully updated user.', $payload);
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
            $isDeleted = $this->userRepository->delete($id);
            return $this->respondWithMessage('Successfully deleted user.', $isDeleted);
        } catch (\Exception $exception) {
            return $this->respondWithError($exception->getMessage());
        }
    }

}
