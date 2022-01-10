<?php

namespace App\Rules\Circle;

use Illuminate\Contracts\Validation\Rule;

class CircleDiameterRule implements Rule
{
    /**
     * @var string
     */
    private string $relatedValue;

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
        if (request()->input('area')) {
            return floatval($value) === (sqrt(floatval(request()->input('area')) / pi()) * 2);
        }

        $this->relatedValue = 'perimeter';
        if (request()->input('perimeter')) {
            return floatval($value) === (floatval(request()->input('perimeter')) / pi());
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return "A value does not coincide with given $this->relatedValue.";
    }
}
