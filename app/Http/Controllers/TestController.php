<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return response()->json([
            'code' => 200,
            'msg' => 'hello world',
        ]);
    }
}
