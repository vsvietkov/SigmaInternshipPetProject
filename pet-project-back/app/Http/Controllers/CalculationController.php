<?php

namespace App\Http\Controllers;

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
        $circle = new Circle(
            $request->input('radius'),
            $request->input('diameter'),
            $request->input('area'),
            $request->input('perimeter')
        );
        $circle->calculateAllAttributes();

        return response()->json([
            $circle->getRadius(),
            $circle->getDiameter(),
            $circle->getArea(),
            $circle->getPerimeter(),
        ]);
    }
}
