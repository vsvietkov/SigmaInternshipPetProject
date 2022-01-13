<?php

namespace Tests\Unit;

use App\Components\Shapes\Square;
use Tests\TestCase;

class SquareTest extends TestCase
{
    /**
     * @var float[]
     */
    private array $expectedValues = [
        'side'      => 2,
        'diagonal'  => 2.8284271247461903,
        'area'      => 4,
        'perimeter' => 8,
    ];

    /**
     * Test the calculation of the side
     *
     * @covers \App\Components\Shapes\Square::calculateSide
     */
    public function test__calculateSide()
    {
        $square = new Square(null, $this->expectedValues['diagonal']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());

        $square = new Square(null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());

        $square = new Square(null, null, null, $this->expectedValues['perimeter']);
        $this->assertEquals($this->expectedValues['side'], $square->calculateSide());
    }

    /**
     * Test the calculation of the diagonal
     *
     * @covers \App\Components\Shapes\Square::calculateDiagonal
     */
    public function test__calculateDiagonal()
    {
        $square = new Square($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['diagonal'], $square->calculateDiagonal());

        $square = new Square(null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['diagonal'], $square->calculateDiagonal());

        $square = new Square(null, null, null, $this->expectedValues['perimeter']);
        $this->assertEquals($this->expectedValues['diagonal'], $square->calculateDiagonal());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Square::calculateArea
     */
    public function test__calculateArea()
    {
        $square = new Square($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());

        $square = new Square(null, $this->expectedValues['diagonal']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());

        $square = new Square(null, null, null, $this->expectedValues['perimeter']);
        $this->assertEquals($this->expectedValues['area'], $square->calculateArea());
    }

    /**
     * Test the calculation of the perimeter
     *
     * @covers \App\Components\Shapes\Square::calculatePerimeter
     */
    public function test__calculatePerimeter()
    {
        $square = new Square($this->expectedValues['side']);
        $this->assertEquals($this->expectedValues['perimeter'], $square->calculatePerimeter());

        $square = new Square(null, $this->expectedValues['diagonal']);
        $this->assertEquals($this->expectedValues['perimeter'], $square->calculatePerimeter());

        $square = new Square(null, null, $this->expectedValues['area']);
        $this->assertEquals($this->expectedValues['perimeter'], $square->calculatePerimeter());
    }
}
