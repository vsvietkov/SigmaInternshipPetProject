<?php

namespace Tests\Unit;

use App\Components\Shapes\Circle;
use Tests\TestCase;

class CircleTest extends TestCase
{
    /**
     * Test the calculation of the radius
     *
     * @covers \App\Components\Shapes\Circle::calculateRadius
     */
    public function test__calculateRadius()
    {
        $expectedRadius = 1;
        $circle         = new Circle(null, 2);
        $this->assertEquals($expectedRadius, $circle->calculateRadius());

        $circle = new Circle(null, 1.999);
        $this->assertNotEquals($expectedRadius, $circle->calculateRadius());

        $circle = new Circle(null, null, pi());
        $this->assertEquals($expectedRadius, $circle->calculateRadius());

        $circle = new Circle(null, null, 3.14);
        $this->assertNotEquals($expectedRadius, $circle->calculateRadius());

        $circle = new Circle(null, null, null, 6.2831853071796);
        $this->assertEquals($expectedRadius, $circle->calculateRadius());

        $circle = new Circle(null, null, null, 6.283);
        $this->assertNotEquals($expectedRadius, $circle->calculateRadius());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Circle::calculateDiameter
     */
    public function test__calculateDiameter()
    {
        $expectedDiameter = 2;
        $circle           = new Circle(1);
        $this->assertEquals($expectedDiameter, $circle->calculateDiameter());

        $circle = new Circle(1.001);
        $this->assertNotEquals($expectedDiameter, $circle->calculateDiameter());

        $circle = new Circle(null, null, pi());
        $this->assertEquals($expectedDiameter, $circle->calculateDiameter());

        $circle = new Circle(null, null, 3.14);
        $this->assertNotEquals($expectedDiameter, $circle->calculateDiameter());

        $circle = new Circle(null, null, null, 6.2831853071796);
        $this->assertEquals($expectedDiameter, $circle->calculateDiameter());

        $circle = new Circle(null, null, null, 6.283);
        $this->assertNotEquals($expectedDiameter, $circle->calculateDiameter());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Circle::calculateArea
     */
    public function test__calculateArea()
    {
        $expectedArea = pi();
        $circle       = new Circle(1);
        $this->assertEquals($expectedArea, $circle->calculateArea());

        $circle = new Circle(1.001);
        $this->assertNotEquals($expectedArea, $circle->calculateArea());

        $circle = new Circle(null, 2);
        $this->assertEquals($expectedArea, $circle->calculateArea());

        $circle = new Circle(null, 2.00001);
        $this->assertNotEquals($expectedArea, $circle->calculateArea());

        $circle = new Circle(null, null, null, 6.2831853071796);
        $this->assertEquals($expectedArea, $circle->calculateArea());

        $circle = new Circle(null, null, null, 6.283);
        $this->assertNotEquals($expectedArea, $circle->calculateArea());
    }

    /**
     * Test the calculation of the perimeter
     *
     * @covers \App\Components\Shapes\Circle::calculatePerimeter
     */
    public function test__calculatePerimeter()
    {
        $expectedPerimeter = 6.2831853071796;
        $circle            = new Circle(1);
        $this->assertEquals($expectedPerimeter, $circle->calculatePerimeter());

        $circle = new Circle(1.001);
        $this->assertNotEquals($expectedPerimeter, $circle->calculatePerimeter());

        $circle = new Circle(null, 2);
        $this->assertEquals($expectedPerimeter, $circle->calculatePerimeter());

        $circle = new Circle(null, 2.00001);
        $this->assertNotEquals($expectedPerimeter, $circle->calculatePerimeter());

        $circle = new Circle(null, null, 3.1415926535898);
        $this->assertEquals($expectedPerimeter, $circle->calculatePerimeter());

        $circle = new Circle(null, null, 3.14);
        $this->assertNotEquals($expectedPerimeter, $circle->calculatePerimeter());
    }
}
