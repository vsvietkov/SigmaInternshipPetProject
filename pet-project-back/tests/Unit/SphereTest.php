<?php

namespace Tests\Unit;

use App\Components\Shapes\Sphere;
use Tests\TestCase;

class SphereTest extends TestCase
{
    /**
     * @var float[]
     */
    private array $expectedValues = [
        'radius'   => 1,
        'diameter' => 2,
        'area'     => 12.566370614359172,
        'volume'   => 4.1887902047863905,
    ];

    /**
     * Test the calculation of the radius
     *
     * @covers \App\Components\Shapes\Sphere::calculateRadius
     */
    public function test__calculateRadius()
    {
        $expectedRadius = $this->expectedValues['radius'];
        $sphere         = new Sphere(null, $this->expectedValues['diameter']);
        $this->assertEquals($expectedRadius, $sphere->calculateRadius());

        $sphere = new Sphere(3, $this->expectedValues['diameter']);
        $this->assertNotEquals($expectedRadius, $sphere->calculateRadius());

        $sphere = new Sphere(null, null, $this->expectedValues['area']);
        $this->assertEquals($expectedRadius, $sphere->calculateRadius());

        $sphere = new Sphere(null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($expectedRadius, $sphere->calculateRadius());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Sphere::calculateDiameter
     */
    public function test__calculateDiameter()
    {
        $expectedDiameter = $this->expectedValues['diameter'];
        $sphere           = new Sphere($this->expectedValues['radius']);
        $this->assertEquals($expectedDiameter, $sphere->calculateDiameter());

        $sphere = new Sphere(null, null, $this->expectedValues['area']);
        $this->assertEquals($expectedDiameter, $sphere->calculateDiameter());

        $sphere = new Sphere(null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($expectedDiameter, $sphere->calculateDiameter());
    }

    /**
     * Test the calculation of the area
     *
     * @covers \App\Components\Shapes\Sphere::calculateArea
     */
    public function test__calculateArea()
    {
        $expectedArea = $this->expectedValues['area'];
        $sphere       = new Sphere($this->expectedValues['radius']);
        $this->assertEquals($expectedArea, $sphere->calculateArea());

        $sphere = new Sphere(null, $this->expectedValues['diameter']);
        $this->assertEquals($expectedArea, $sphere->calculateArea());

        $sphere = new Sphere(null, null, null, $this->expectedValues['volume']);
        $this->assertEquals($expectedArea, $sphere->calculateArea());
    }

    /**
     * Test the calculation of the volume
     *
     * @covers \App\Components\Shapes\Sphere::calculateVolume
     */
    public function test__calculateVolume()
    {
        $expectedVolume = $this->expectedValues['volume'];
        $sphere         = new Sphere($this->expectedValues['radius']);
        $this->assertEquals($expectedVolume, $sphere->calculateVolume());

        $sphere = new Sphere(null, $this->expectedValues['diameter']);
        $this->assertEquals($expectedVolume, $sphere->calculateVolume());

        $sphere = new Sphere(null, null, $this->expectedValues['area']);
        $this->assertEquals($expectedVolume, $sphere->calculateVolume());
    }
}
