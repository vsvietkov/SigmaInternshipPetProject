<?php

namespace App\Rules\Circle;

use App\Components\Shapes\Circle;
use App\Rules\BaseRule;

class CirclePerimeterRule extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $circle = null;
        if (request()->input('radius')) {
            $this->relatedValue = 'radius';
            $circle = new Circle(floatval(request()->input('radius')));
        } else if (request()->input('Circle_diameter')) {
            $this->relatedValue = 'diameter';
            $circle = new Circle(null, floatval(request()->input('Circle_diameter')));
        } else if (request()->input('Circle_area')) {
            $this->relatedValue = 'area';
            $circle = new Circle(null, null, floatval(request()->input('Circle_area')));
        }

        return is_null($circle) || floatval($value) === $circle->calculatePerimeter();
    }
}
