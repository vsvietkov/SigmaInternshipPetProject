<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class CalculationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules        = [];
        $exclude_rule = 'exclude_unless:shape,';
        $rules        += $this->getCircleRules($exclude_rule);

        return $rules;
    }

    /**
     * @param  string $exclude_rule
     * @return string[]
     */
    private function getCircleRules(string $exclude_rule): array
    {
        $exclude_rule .= 'circle;';
        return [
            'radius'   => $exclude_rule,
            'diameter' => $exclude_rule,
        ];
    }

    /**
     * @param  string $exclude_rule
     * @return string[]
     */
    private function getSphereRules(string $exclude_rule): array
    {
        $exclude_rule .= 'sphere;';
        return [
            'radius'   => $exclude_rule,
            'diameter' => $exclude_rule,
        ];
    }
}
