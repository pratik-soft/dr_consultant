<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 2",
        ];

        return response()->json($response, 200);
    }

    public function addData(Request $request)
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 2 POST API",
            'data'=>$request->all()
        ];

        return response()->json($response, 200);
    }
}
