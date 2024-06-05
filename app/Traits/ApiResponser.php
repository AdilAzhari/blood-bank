<?php

namespace App\Traits;

use App\Http\Resources\ClientResource;

trait ApiResponser
{
    protected function successResponse($data, $message = 'Success', $code = 200)
    {
        return ClientResource::collection($data);
        // json([
        //     'status' => 'success',
        //     'message' => $message,
        //     'data' => $data
        // ], $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], $code);
    }

    protected function customResponse($status, $data, $message, $code)
    {
        return ClientResource::collection($data);

        // response()->json([
        //     'status' => $status,
        //     'message' => $message,
        //     'data' => $data
        // ], $code);
    }
}
