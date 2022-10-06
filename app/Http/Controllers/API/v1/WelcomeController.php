<?php
namespace App\Http\Controllers\API\v1;


use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;

class WelcomeController extends BaseController
{
    public function index()
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 1 GET API",
        ];

        return response()->json($response, 200);
    }

    public function addData(Request $request)
    {
        $response = [
            'success' => true,
            'message' => "Welcome to API version 1 POST API",
            'data'=>$request->all()
        ];

        return response()->json($response, 200);
    }
}
