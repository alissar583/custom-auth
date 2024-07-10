<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    
    public function successResponse(array|object $result = [], $message = 'success', $resource = true): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => (is_array($result) || $result instanceof Collection )? $result['data'] ?? $result : $result->data ?? $result,
            'meta' => (is_array($result) || $result instanceof Collection )? $result['meta'] ?? null : $result->meta ?? null,
            'links' => (is_array($result) || $result instanceof Collection )? $result['links'] ?? null : $result->links ?? null,

        ];

        return response()->json($response, 200);
    }

    public function failResponse($error = "something went wrong", $code = 400): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        return response()->json($response, $code);
    }
}
