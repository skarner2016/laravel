<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\ApiException;
use App\Http\Requests\Api\TestRequest;

class TestController extends Controller
{
    public function index(TestRequest $request)
    {
        return response()->json([
            'code' => 200,
            'msg' => 'hello world',
        ]);
    }
}
