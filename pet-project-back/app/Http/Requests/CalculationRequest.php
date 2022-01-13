<?php

namespace App\Http\Requests;

use App\Rules\Circle\CircleAreaRule;
use App\Rules\Circle\CircleDiameterRule;
use App\Rules\Circle\CirclePerimeterRule;
use App\Rules\Sphere\SphereAreaRule;
use App\Rules\Sphere\SphereDiameterRule;
use App\Rules\Sphere\SphereVolumeRule;
use App\Rules\Square\SquareAreaRule;
use App\Rules\Square\SquareDiagonalRule;
use App\Rules\Square\SquarePerimeterRule;
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
            'side'     => $commonRule,
        ];
        $rules += $this->getCircleRules($commonRule);
        $rules += $this->getSphereRules($commonRule);
        $rules += $this->getSquareRules($commonRule);

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

    /**
     * @param  string $commonRule
     * @return array
     */
    private function getSphereRules(string $commonRule): array
    {
        $rules = $this->getArrayOfRules($commonRule);
        return [
            'Sphere_diameter' => array_merge($rules, [new SphereDiameterRule()]),
            'Sphere_area'     => array_merge($rules, [new SphereAreaRule()]),
            'Sphere_volume'   => array_merge($rules, [new SphereVolumeRule()]),
        ];
    }

    /**
     * @param  string $commonRule
     * @return array
     */
    private function getSquareRules(string $commonRule): array
    {
        $rules = $this->getArrayOfRules($commonRule);
        return [
            'Square_diagonal'  => array_merge($rules, [new SquareDiagonalRule()]),
            'Square_area'      => array_merge($rules, [new SquareAreaRule()]),
            'Square_perimeter' => array_merge($rules, [new SquarePerimeterRule()]),
        ];
    }
}
