<?php namespace App\Rules\Sphere;

use App\Components\Shapes\Sphere;
use App\Rules\BaseRule;

class SphereAreaRule extends BaseRule
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
        $sphere = null;
        if (request()->input('radius')) {
            $this->relatedValue = 'radius';
            $sphere = new Sphere(floatval(request()->input('radius')));
        } else if (request()->input('Sphere_diameter')) {
            $this->relatedValue = 'diameter';
            $sphere = new Sphere(null, floatval(request()->input('Sphere_diameter')));
        } else if (request()->input('Sphere_volume')) {
            $this->relatedValue = 'volume';
            $sphere = new Sphere(null, null, null, floatval(request()->input('Sphere_volume')));
        }

        return is_null($sphere) ?? floatval($value) === $sphere->calculateArea();
    }
}
