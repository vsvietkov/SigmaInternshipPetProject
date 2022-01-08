<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CircleAreaRule implements Rule
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
        if (request()->has('radius')) {
            return floatval($value) === (pow(floatval(request()->input('radius')), 2) * pi());
        }

        $this->relatedValue = 'diameter';
        if (request()->has('diameter')) {
            return floatval($value) === (pow(floatval(request()->input('diameter')) / 2, 2) * pi());
        }

        $this->relatedValue = 'perimeter';
        if (request()->has('perimeter')) {
            return floatval($value) === (pow(floatval(request()->input('perimeter')) / 2 / pi(), 2) * pi());
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
