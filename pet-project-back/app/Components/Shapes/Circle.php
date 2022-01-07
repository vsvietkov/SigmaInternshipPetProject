<?php namespace App\Components\Shapes;

use App\Interfaces\Shape;
use App\Interfaces\Shape2D;

class Circle implements Shape, Shape2D
{
    /**
     * @var float|null
     */
    private ?float $radius;

    /**
     * @var float|null
     */
    private ?float $diameter;

    /**
     * @var float|null
     */
    private ?float $area;

    /**
     * @var float|null
     */
    private ?float $perimeter;

    public function __construct(
        ?float $radius = null,
        ?float $diameter = null,
        ?float $area = null,
        ?float $perimeter = null,
    ) {
        $this->radius    = $radius;
        $this->diameter  = $diameter;
        $this->area      = $area;
        $this->perimeter = $perimeter;
    }

    /**
     * @return float|null
     */
    public function getRadius(): ?float
    {
        return $this->radius;
    }

    /**
     * @return float|null
     */
    public function getDiameter(): ?float
    {
        return $this->diameter;
    }

    /**
     * @return float|null
     */
    public function getArea(): ?float
    {
        return $this->area;
    }

    /**
     * @return float|null
     */
    public function getPerimeter(): ?float
    {
        return $this->perimeter;
    }

    /**
     * @return float|null
     */
    public function calculateArea(): ?float
    {
        return is_null($this->radius) ? (pi() * pow($this->radius, 2)) : null;
    }

    /**
     * @return float|null
     */
    public function calculatePerimeter(): ?float
    {
        return is_null($this->radius) ? (2 * pi() * $this->radius) : null;
    }

    /**
     * @return void
     */
    public function calculateAllAttributes(): void
    {
    }
}
