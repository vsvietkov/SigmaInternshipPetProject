<?php

namespace App\Http\Requests;

use App\Rules\CircleAreaRule;
use App\Rules\CircleDiameterRule;
use App\Rules\CirclePerimeterRule;
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
        $commonRule .= '|exclude_unless:shape,';
        $rules      += $this->getCircleRules($commonRule);

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
        $commonRule .= 'Circle';
        $rules       = $this->getArrayOfRules($commonRule);
        return [
            'diameter'  => array_merge($rules, [new CircleDiameterRule()]),
            'area'      => array_merge($rules, [new CircleAreaRule()]),
            'perimeter' => array_merge($rules, [new CirclePerimeterRule()]),
        ];
    }
}
