<?php

namespace App\Http\Requests;

use App\Libraries\Api;
use App\Libraries\ErrorCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @desc    return code & message
     * @param Validator $validator
     * @author  panjunda@heyuedi.net <2021-12-09 18:08>
     */
    public function failedValidation(Validator $validator)
    {
        $response = Api::fail(ErrorCode::PARAM_ERROR, $validator->errors()->first());

        throw new HttpResponseException($response);
    }
}
