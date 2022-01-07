<?php namespace App\Components;

use App\Interfaces\Shape;

class CalculationsOutputter
{
    /**
     * @var Shape
     */
    private Shape $shape;

    public function __construct(Shape $shape)
    {
        $this->shape = $shape;
    }
}
