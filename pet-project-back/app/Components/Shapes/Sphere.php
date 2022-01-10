<?php namespace App\Components\Shapes;

use App\Components\BaseShape;
use App\Interfaces\Shape3DInterface;
use App\Interfaces\ShapeInterface;

class Sphere extends BaseShape implements ShapeInterface, Shape3DInterface
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
    private ?float $volume;

    /**
     * @param float|null $radius
     * @param float|null $diameter
     * @param float|null $area
     * @param float|null $volume
     */
    public function __construct(
        ?float $radius = null,
        ?float $diameter = null,
        ?float $area = null,
        ?float $volume = null,
    ) {
        if (request()->input('shape') === 'Sphere') {
            $this->radius   = request()->input('radius');
            $this->diameter = request()->input('diameter');
            $this->area     = request()->input('area');
            $this->volume   = request()->input('volume');
        } else {
            $this->radius   = $radius;
            $this->diameter = $diameter;
            $this->area     = $area;
            $this->volume   = $volume;
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
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    /**
     * @return void
     */
    public function calculateAllAttributes(): void
    {
        $this->radius   = $this->calculateRadius();
        $this->diameter = $this->calculateDiameter();
        $this->area     = $this->calculateArea();
        $this->volume   = $this->calculateVolume();
    }

    /**
     * @return float|null
     */
    public function calculateRadius(): ?float
    {
        if (!is_null($this->radius)) {
            return $this->radius;
        } else if (!is_null($this->diameter)) {
            $this->radius = $this->diameter / 2;
        } else if (!is_null($this->area)) {
            $this->radius = sqrt(sqrt($this->area / 4 / pi()));
        } else if (!is_null($this->volume)) {
            $this->radius = pow($this->volume * 3 / 4 / pi(), 1/3);
        }

        return $this->radius;
    }

    /**
     * @return float|null
     */
    public function calculateDiameter(): ?float
    {
        if (is_null($this->calculateRadius())) {
            return null;
        }

        return is_null($this->diameter) ? ($this->calculateRadius() * 2) : $this->diameter;
    }

    /**
     * @return float|null
     */
    public function calculateArea(): ?float
    {
        if (is_null($this->calculateRadius())) {
            return null;
        }

        return is_null($this->area) ? (4 * pi() * pow($this->calculateRadius(), 2)) : $this->area;
    }

    /**
     * @return float|null
     */
    public function calculateVolume(): ?float
    {
        if (is_null($this->calculateRadius())) {
            return null;
        }

        return is_null($this->volume) ? (4 / 3 * pi() * pow($this->calculateRadius(), 3)) : $this->volume;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'radius'   => $this->radius,
            'diameter' => $this->diameter,
            'area'     => $this->area,
            'volume'  => $this->volume,
        ];
    }
}
