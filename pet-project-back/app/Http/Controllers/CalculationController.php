<?php

namespace App\Http\Controllers;

use App\Components\CalculationsOutputter;
use App\Components\ShapeFactory;
use App\Components\Shapes\Circle;
use App\Exceptions\NoSuchShapeException;
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
        try {
            $shape = $shapeFactory->make($request->input('shape'));
        } catch (NoSuchShapeException $e) {
            return $e->getResponse();
        }

        $shape->calculateAllAttributes();
        $outputter = new CalculationsOutputter($shape);

        return response()->json($outputter->output());
    }
}
