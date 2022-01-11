<?php

namespace App\Rules\Circle;

use App\Rules\BaseRule;

class CircleDiameterRule extends BaseRule
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
            return floatval($value) === (floatval(request()->input('radius')) * 2);
        }

        $this->relatedValue = 'area';
        if (request()->input('Circle_area')) {
            return floatval($value) === (sqrt(floatval(request()->input('Circle_area')) / pi()) * 2);
        }

        $this->relatedValue = 'perimeter';
        if (request()->input('Circle_perimeter')) {
            return floatval($value) === (floatval(request()->input('Circle_perimeter')) / pi());
        }

        return true;
    }
}
