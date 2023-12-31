<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait 
{
    /**
     * Success response.
     *
     * @param array|object $data
     * @param string $message
     * 
     * @return JsonResponse
     */
    public function responseSuccess($data,$message = 'Successful'): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null
        ]);
    }

    /**
     * Error response.
     *
     * @param array|object $errors
     * @param string $message
     * 
     * @return JsonResponse
     */
    public function responseError($errors, $message = "Something went wrong"): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ]);    
    }
}