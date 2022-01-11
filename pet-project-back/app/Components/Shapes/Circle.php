<?php namespace App\Components\Shapes;

use App\Components\BaseShape;
use App\Interfaces\ShapeInterface;
use App\Interfaces\Shape2DInterface;

class Circle extends BaseShape implements ShapeInterface, Shape2DInterface
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

    /**
     * @param float|null $radius
     * @param float|null $diameter
     * @param float|null $area
     * @param float|null $perimeter
     */
    public function __construct(
        ?float $radius = null,
        ?float $diameter = null,
        ?float $area = null,
        ?float $perimeter = null,
    ) {
        if (func_num_args() === 0) {
            $this->radius    = request()->input('radius');
            $this->diameter  = request()->input('Circle_diameter');
            $this->area      = request()->input('Circle_area');
            $this->perimeter = request()->input('Circle_perimeter');
        } else {
            $this->radius    = $radius;
            $this->diameter  = $diameter;
            $this->area      = $area;
            $this->perimeter = $perimeter;
        }
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
     * @return void
     */
    public function calculateAllAttributes(): void
    {
        if (is_null($this->radius)) {
            $this->radius = $this->calculateRadius();
        }

        if (is_null($this->diameter)) {
            $this->diameter = $this->calculateDiameter();
        }

        if (is_null($this->area)) {
            $this->area = $this->calculateArea();
        }

        if (is_null($this->perimeter)) {
            $this->perimeter = $this->calculatePerimeter();
        }
    }

    /**
     * @return float|null
     */
    public function calculateRadius(): ?float
    {
        if (!is_null($this->diameter)) {
            return $this->diameter / 2;
        }

        if (!is_null($this->area)) {
            return sqrt($this->area / pi());
        }

        if (!is_null($this->perimeter)) {
            return $this->perimeter / 2 / pi();
        }

        return null;
    }

    /**
     * @return float|null
     */
    public function calculateDiameter(): ?float
    {
        if (!is_null($this->radius)) {
            return $this->radius * 2;
        }

        if (!is_null($this->area)) {
            return sqrt($this->area / pi()) * 2;
        }

        if (!is_null($this->perimeter)) {
            return $this->perimeter / pi();
        }

        return null;
    }

    /**
     * @return float|null
     */
    public function calculateArea(): ?float
    {
        if (!is_null($this->radius)) {
            return (pi() * pow($this->radius, 2));
        }

        if (!is_null($this->diameter)) {
            return (pi() * pow($this->diameter / 2, 2));
        }

        if (!is_null($this->perimeter)) {
            return (pi() * pow($this->perimeter / 2 / pi(), 2));
        }

        return null;
    }

    /**
     * @return float|null
     */
    public function calculatePerimeter(): ?float
    {
        if (!is_null($this->radius)) {
            return (2 * pi() * $this->radius);
        }

        if (!is_null($this->diameter)) {
            return (pi() * $this->diameter);
        }

        if (!is_null($this->area)) {
            return (2 * pi() * sqrt($this->area / pi()));
        }

        return null;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'radius'    => $this->radius,
            'diameter'  => $this->diameter,
            'area'      => $this->area,
            'perimeter' => $this->perimeter,
        ];
    }
}
