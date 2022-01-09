<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NoSuchShapeException extends Exception
{
    /**
     * @return JsonResponse
     */
    public function getResponse(): JsonResponse
    {
        return response()->json([
            'errors' => [
                'shape' => ['We cannot provide calculations for this shape'],
            ],
        ], 422);
    }
}
