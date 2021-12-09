<?php

namespace App\Http\Requests\Api;


use App\Http\Requests\ApiRequest;

class TestRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'id' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => 'id必须为数字',
        ];
    }
}
