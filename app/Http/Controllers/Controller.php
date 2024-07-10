<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function error(
        \Exception $error,
        Int $status_code
    ){
        return response()->json([
            'response'  => false,
            'data'      => [
                'message'   => $error->getMessage(),
                'code'      => $error->getCode(),
                'line'      => $error->getLine(),
                'trace'     => $error->getTraceAsString()
            ]
        ], $status_code);
    }
}
