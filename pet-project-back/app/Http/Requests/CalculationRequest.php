<?php

namespace App\Http\Requests;

use App\Rules\Circle\CircleAreaRule;
use App\Rules\Circle\CircleDiameterRule;
use App\Rules\Circle\CirclePerimeterRule;
use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $commonRule = 'nullable|numeric|min:0|not_in:0';
        $rules      = [
            'shape'    => 'required|string',
            'radius'   => $commonRule,
        ];
        $rules += $this->getCircleRules($commonRule);

        return $rules;
    }

    /**
     * @param  string $inputRules
     * @return array
     */
    private function getArrayOfRules(string $inputRules): array
    {
        return explode('|', $inputRules);
    }

    /**
     * @param  string $commonRule
     * @return string[]
     */
    private function getCircleRules(string $commonRule): array
    {
        $rules = $this->getArrayOfRules($commonRule);
        return [
            'Circle_diameter'  => array_merge($rules, [new CircleDiameterRule()]),
            'Circle_area'      => array_merge($rules, [new CircleAreaRule()]),
            'Circle_perimeter' => array_merge($rules, [new CirclePerimeterRule()]),
        ];
    }
}
