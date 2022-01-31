<?php namespace App\Components\Shapes;

use App\Components\BaseShape;
use App\Interfaces\ShapeInterface;
use App\Interfaces\Shape2DInterface;

class Square extends BaseShape implements ShapeInterface, Shape2DInterface
{
    /**
     * @var float|null
     */
    private ?float $side;

    /**
     * @var float|null
     */
    private ?float $diagonal;

    /**
     * @var float|null
     */
    private ?float $area;

    /**
     * @var float|null
     */
    private ?float $perimeter;

    /**
     * @param float|null $side
     * @param float|null $diagonal
     * @param float|null $area
     * @param float|null $perimeter
     */
    public function __construct(
        ?float $side = null,
        ?float $diagonal = null,
        ?float $area = null,
        ?float $perimeter = null,
    ) {
        if (func_num_args() === 0) {
            $this->side      = request()->input('side');
            $this->diagonal  = request()->input('Square_diagonal');
            $this->area      = request()->input('Square_area');
            $this->perimeter = request()->input('Square_perimeter');
        } else {
            $this->side      = $side;
            $this->diagonal  = $diagonal;
            $this->area      = $area;
            $this->perimeter = $perimeter;
        }
    }

    /**
     * @return float|null
     */
    public function getSide(): ?float
    {
        return $this->side;
    }

    /**
     * @return float|null
     */
    public function getDiagonal(): ?float
    {
        return $this->diagonal;
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
        $this->side      = $this->calculateSide();
        $this->diagonal  = $this->calculateDiagonal();
        $this->area      = $this->calculateArea();
        $this->perimeter = $this->calculatePerimeter();
    }

    /**
     * @return float|null
     */
    public function calculateSide(): ?float
    {
        if (!is_null($this->side)) {
            return $this->side;
        } else if (!is_null($this->diagonal)) {
            return sqrt(pow($this->diagonal, 2) / 2);
        } else if (!is_null($this->area)) {
            return sqrt($this->area);
        } else if (!is_null($this->perimeter)) {
            return $this->perimeter / 4;
        }

        return $this->side;
    }

    /**
     * @return float|null
     */
    public function calculateDiagonal(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->diagonal) ? (sqrt(pow($this->calculateSide(), 2) * 2)) : $this->diagonal;
    }

    /**
     * @return float|null
     */
    public function calculateArea(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->area) ? (pow($this->calculateSide(), 2)) : $this->area;
    }

    /**
     * @return float|null
     */
    public function calculatePerimeter(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->perimeter) ? ($this->calculateSide() * 4) : $this->perimeter;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'side'      => $this->side,
            'diagonal'  => $this->diagonal,
            'area'      => $this->area,
            'perimeter' => $this->perimeter,
        ];
    }
}
