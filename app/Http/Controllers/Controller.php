<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function auth()
    {
        return auth()->user();
    }


    public function response($data)
    {
        return response()->json([
            'data' => $data,
        ]);
    }


    public function success(string $message,  $data = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => "success",

            'massage' => $message ?? 'operation successsfull',
            'data' => $data,
        ]);
    }

    public function error(string $message,  $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status' => "error",

            'massage' => $message ?? 'error occured',
            'data' => $data,
        ]);
    }
}
