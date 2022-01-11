<?php

namespace App\Rules\Circle;

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
        $this->relatedValue = 'radius';
        if (request()->input('radius')) {
            return floatval($value) === (floatval(request()->input('radius')) * 2 * pi());
        }

        $this->relatedValue = 'diameter';
        if (request()->input('Circle_diameter')) {
            return floatval($value) === (floatval(request()->input('Circle_diameter')) * pi());
        }

        $this->relatedValue = 'area';
        if (request()->input('Circle_area')) {
            return floatval($value) === (sqrt(floatval(request()->input('Circle_area')) / pi()) * 2 * pi());
        }

        return true;
    }
}
