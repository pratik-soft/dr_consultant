<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @param AuthenticationException $exception
     * @return void
    */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // return response(
        //     ['data'=> 
        //         [
        //             "status"        => "false",
        //             "message"       => "User not authorized",
        //             "error"         => "unauthorized",
        //             "responseCode"  => 401,
        //         ],
        //     ],401
        // );
        // abort(response()->json(['error' => 'Unauthenticated User'], 401));
    }
}
