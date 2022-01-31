<?php

namespace Tests\Unit;

use App\Components\Shapes\Cube;
use Tests\TestCase;

class CubeTest extends TestCase
{
    /**
     * @var float[]
     */
    private array $expectedValues = [
        'side'          => 3,
        'diagonalSmall' => 4.242640687119286,
        'diagonalBig'   => 5.196152422706632,
        'area'          => 54,
        'volume'        => 27,
    ];

    /**
     * Test the calculation of the side
     *
     * @covers \App\Components\Shapes\Cube::calculateSide
     */
    public function test__calculateSide()
    {
        $square = new Cube(null, $this->expectedValues['diagonalSmall']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());

        $square = new Cube(null, null, $this->expectedValues['diagonalBig']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());

        $square = new Cube(null, null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());

        $square = new Cube(null, null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());
    }

    /**
     * Test the calculation of the small diagonal
     *
     * @covers \App\Components\Shapes\Cube::calculateDiagonalSmall
     */
    public function test__calculateDiagonalSmall()
    {
        $square = new Cube($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['diagonalSmall'], $square->calculateDiagonalSmall());

        $square = new Cube(null, null, $this->expectedValues['diagonalBig']);
        $this->assertEquals($this->expectedValues['diagonalSmall'], $square->calculateDiagonalSmall());

        $square = new Cube(null, null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['diagonalSmall'], $square->calculateDiagonalSmall());

        $square = new Cube(null, null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($this->expectedValues['diagonalSmall'], $square->calculateDiagonalSmall());
    }

    /**
     * Test the calculation of the big diagonal
     *
     * @covers \App\Components\Shapes\Cube::calculateDiagonalBig
     */
    public function test__calculateDiagonalBig()
    {
        $square = new Cube($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['diagonalBig'], $square->calculateDiagonalBig());

        $square = new Cube(null, $this->expectedValues['diagonalSmall']);
        $this->assertEquals($this->expectedValues['diagonalBig'], $square->calculateDiagonalBig());

        $square = new Cube(null, null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['diagonalBig'], $square->calculateDiagonalBig());

        $square = new Cube(null, null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($this->expectedValues['diagonalBig'], $square->calculateDiagonalBig());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Cube::calculateArea
     */
    public function test__calculateArea()
    {
        $square = new Cube($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());

        $square = new Cube(null, $this->expectedValues['diagonalSmall']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());

        $square = new Cube(null, null, $this->expectedValues['diagonalBig']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());

        $square = new Cube(null, null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());
    }

    /**
     * Test the calculation of the volume
     *
     * @covers \App\Components\Shapes\Cube::calculateVolume
     */
    public function test__calculateVolume()
    {
        $square = new Cube($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['volume'], $square->calculateVolume());

        $square = new Cube(null, $this->expectedValues['diagonalSmall']);
        $this->assertEquals($this->expectedValues['volume'], $square->calculateVolume());

        $square = new Cube(null, null, $this->expectedValues['diagonalBig']);
        $this->assertEquals($this->expectedValues['volume'], $square->calculateVolume());

        $square = new Cube(null, null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['volume'], $square->calculateVolume());
    }
}
