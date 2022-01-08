<?php

namespace App\Http\Controllers;

use App\Components\CalculationsOutputter;
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
        $shape = new Circle(
            $request->input('radius'),
            $request->input('diameter'),
            $request->input('area'),
            $request->input('perimeter')
        );
        $shape->calculateAllAttributes();
        $outputter = new CalculationsOutputter($shape);

        return response()->json($outputter->output());
    }
}
