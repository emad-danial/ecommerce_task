<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait jsonResponseCommon
{
    private function getValidationErrorMsgInArray($validator): array
    {
        $messages = $validator->errors();
        $errors   = [];

        foreach ($messages->jsonSerialize() as $field => $msg) {
            $errors[] = [
                "field"     => $field,
                "errorCode" => "Validation",
                "errorMsg"  => $msg[0]
            ];
        }

        return $errors;
    }

    private function getJsonBadRequestErrorResponse(string $msg = "", array $data = []): object
    {
        $statusCode = Response::HTTP_BAD_REQUEST;

        $response = $this->_getErrorResponse($msg, $data, $statusCode);

        return response()->json($response, Response::HTTP_OK);
    }

    private function _getErrorResponse(string $msg, array $data, int $statusCode = Response::HTTP_BAD_REQUEST): array
    {
        $response = [
            'status'  => '',
            'code'    => $statusCode,
            'Message' => $msg,
            'Data'    => null,
            'Errors'  => ((is_array($data) && count($data) == 0) ? null : $data),
        ];

        return $response;
    }

    public function getJsonSuccessResponse(string $msg = "", array $data = []): object
    {

        $statusCode = Response::HTTP_OK;

        $response = $this->_getSuccessResponse($msg, $data, $statusCode);

        return response()->json($response, Response::HTTP_OK);

    }

    private function _getSuccessResponse(string $msg, array $data, int $statusCode = Response::HTTP_OK): array
    {
        $response = [
            'status'  => '',
            'Message' => $msg,
            'code'    => $statusCode,
            'Data'    => ((is_array($data) && count($data) == 0) ? null : $data),
            'Errors'  => null
        ];

        return $response;
    }
}
