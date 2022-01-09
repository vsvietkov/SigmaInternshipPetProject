<?php

namespace App\Http\Controllers;

use App\Components\CalculationsOutputter;
use App\Components\ShapeFactory;
use App\Components\Shapes\Circle;
use App\Http\Requests\CalculationRequest;
use Illuminate\Http\JsonResponse;

class CalculationController extends Controller
{
    /**
     * @param CalculationRequest $request
     * @return JsonResponse
     */
    public function calculate(CalculationRequest $request): JsonResponse
    {
        $shapeFactory = new ShapeFactory();
        $shape        = $shapeFactory->make($request->input('shape'));
        if (is_null($shape)) {
            return response()->json([
               'errors' => [
                   'shape' => ['We cannot provide calculations for this shape'],
               ],
            ], 422);
        }

        $shape->calculateAllAttributes();
        $outputter = new CalculationsOutputter($shape);

        return response()->json($outputter->output());
    }
}
