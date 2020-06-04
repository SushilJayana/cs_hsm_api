<?php

namespace App\Http\Controllers\Api\v1\Shared;

use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{

    public function __construct()
    {

    }

    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Data Not Found!')
    {
        return $this->setStatusCode(404)->respondWithError($message, 404);
    }

    public function respondValidationError($message = 'Bad Input.Try Again!')
    {
        return $this->setStatusCode(400)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return mixeds
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
     * @param $message
     * @return mixeds
     */
    public function respondWithError($message, $status_code = 500)
    {

        return $this->respond([
            'error' => [
                'success' => false,
                'message' => $message,
                'status_code' => $status_code,
            ]
        ]);

    }

    /**
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond(
        $data,
        $headers = []
    )
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @param $data
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     * Response message when validation is true.
     */
    Public function respondWithMessage($message, $data)
    {
        return $this->respond([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

}
