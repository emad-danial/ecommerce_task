<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;

trait validationCommon
{
    use jsonResponseCommon;
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errorsMessages = $this->getValidationErrorMsgInArray($validator);
        throw new HttpResponseException($this->getJsonBadRequestErrorResponse("", $errorsMessages));
    }
}
