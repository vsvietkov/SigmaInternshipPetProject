<?php

namespace Tests\Feature;

use Tests\BaseShapeFeatureTest;

class CircleCalculationTest extends BaseShapeFeatureTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint           = '/api/calculate';
        $this->expectedJsonResult = [
            'radius'    => 1,
            'diameter'  => 2,
            'area'      => pi(),
            'perimeter' => 6.283185307179586,
        ];
    }

    /**
     * Test the request for circle data calculation
     */
    public function test__circleCalculationRequest()
    {
        $response = $this->postJson($this->endpoint, [
            'radius' => 1,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'  => 'Circle',
            'radius' => 1,
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Circle',
            'radius'          => 1,
            'Circle_diameter' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Circle',
            'radius'          => 1,
            'Circle_diameter' => 2,
        ]);
        $response->assertExactJson($this->expectedJsonResult);
    }
}
