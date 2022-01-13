<?php namespace App\Components\Shapes;

use App\Components\BaseShape;
use App\Interfaces\Shape3DInterface;
use App\Interfaces\ShapeInterface;

class Cube extends BaseShape implements ShapeInterface, Shape3DInterface
{
    /**
     * @var float|null
     */
    private ?float $side;

    /**
     * @var float|null
     */
    private ?float $diagonalSmall;

    /**
     * @var float|null
     */
    private ?float $diagonalBig;

    /**
     * @var float|null
     */
    private ?float $area;

    /**
     * @var float|null
     */
    private ?float $volume;

    /**
     * @param float|null $side
     * @param float|null $diagonalSmall
     * @param float|null $diagonalBig
     * @param float|null $area
     * @param float|null $volume
     */
    public function __construct(
        ?float $side = null,
        ?float $diagonalSmall = null,
        ?float $diagonalBig = null,
        ?float $area = null,
        ?float $volume = null,
    ) {
        if (func_num_args() === 0) {
            $this->side          = request()->input('side');
            $this->diagonalSmall = request()->input('Cube_diagonalSmall');
            $this->diagonalBig   = request()->input('Cube_diagonalBig');
            $this->area          = request()->input('Cube_area');
            $this->volume        = request()->input('Cube_volume');
        } else {
            $this->side          = $side;
            $this->diagonalSmall = $diagonalSmall;
            $this->diagonalBig   = $diagonalBig;
            $this->area          = $area;
            $this->volume        = $volume;
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
    public function getDiagonalSmall(): ?float
    {
        return $this->diagonalSmall;
    }

    /**
     * @return float|null
     */
    public function getDiagonalBig(): ?float
    {
        return $this->diagonalBig;
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
        $this->side          = $this->calculateSide();
        $this->diagonalSmall = $this->calculateDiagonalBig();
        $this->diagonalBig   = $this->calculateDiagonalBig();
        $this->area          = $this->calculateArea();
        $this->volume        = $this->calculateVolume();
    }

    /**
     * @return float|null
     */
    public function calculateSide(): ?float
    {
        if (!is_null($this->side)) {
            return $this->side;
        } else if (!is_null($this->diagonalSmall)) {
            return $this->diagonalSmall / sqrt(2);
        } else if (!is_null($this->diagonalBig)) {
            return $this->diagonalBig / sqrt(3);
        } else if (!is_null($this->area)) {
            return sqrt($this->area / 6);
        } else if (!is_null($this->volume)) {
            return pow($this->volume, 1 / 3);
        }

        return $this->side;
    }

    /**
     * @return float|null
     */
    public function calculateDiagonalSmall(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->diagonalSmall) ? ($this->calculateSide() * sqrt(2)) : $this->diagonalSmall;
    }

    public function calculateDiagonalBig(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->diagonalBig) ? ($this->calculateSide() * sqrt(3)) : $this->diagonalBig;
    }

    /**
     * @return float|null
     */
    public function calculateArea(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->area) ? (6 * pow($this->calculateSide(), 2)) : $this->area;
    }

    /**
     * @return float|null
     */
    public function calculateVolume(): ?float
    {
        if (is_null($this->calculateSide())) {
            return null;
        }

        return is_null($this->volume) ? (pow($this->calculateSide(), 3)) : $this->volume;
    }

    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'side'          => $this->side,
            'diagonalSmall' => $this->diagonalSmall,
            'diagonalBig'   => $this->diagonalBig,
            'area'          => $this->area,
            'volume'        => $this->volume,
        ];
    }
}
