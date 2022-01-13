<?php namespace App\Components;

use App\Interfaces\ShapeInterface;

class CalculationsOutputter
{
    /**
     * @var BaseShape
     */
    private BaseShape $shape;

    public function __construct(BaseShape $shape)
    {
        $this->shape = $shape;
    }

    /**
     * Get the calculated results
     *
     * @return array
     */
    public function output()
    {
        return $this->shape->serialize();
    }
}
