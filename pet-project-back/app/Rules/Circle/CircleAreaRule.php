<?php

namespace App\Rules\Circle;

use App\Rules\BaseRule;

class CircleAreaRule extends BaseRule
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
            return floatval($value) === (pow(floatval(request()->input('radius')), 2) * pi());
        }

        $this->relatedValue = 'diameter';
        if (request()->input('Circle_diameter')) {
            return floatval($value) === (pow(floatval(request()->input('Circle_diameter')) / 2, 2) * pi());
        }

        $this->relatedValue = 'perimeter';
        if (request()->input('Circle_perimeter')) {
            return floatval($value) === (pow(floatval(request()->input('Circle_perimeter')) / 2 / pi(), 2) * pi());
        }

        return true;
    }
}
