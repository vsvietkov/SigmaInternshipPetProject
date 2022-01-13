<?php namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

abstract class BaseRule implements Rule
{
    /**
     * @var string
     */
    protected string $relatedValue;

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
