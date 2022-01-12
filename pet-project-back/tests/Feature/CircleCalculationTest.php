<?php

namespace Tests\Feature;

use Tests\BaseShapeFeatureTest;

class CircleCalculationTest extends BaseShapeFeatureTest
{
    /**
     * @return void
     */
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
     *
     * @return void
     */
    public function test__circleCalculationRequest()
    {
        $response = $this->postJson($this->endpoint, [
            'radius' => 1,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Circle',
            'radius'          => $this->expectedJsonResult['radius'],
            'Circle_diameter' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Circle',
            'radius'          => $this->expectedJsonResult['radius'],
            'Circle_diameter' => $this->expectedJsonResult['diameter'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $this->successCalculationsWithSingleInput();
    }

    /**
     * @return void
     */
    private function successCalculationsWithSingleInput()
    {
        $response = $this->postJson($this->endpoint, [
            'shape'  => 'Circle',
            'radius' => $this->expectedJsonResult['radius'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Circle',
            'Circle_diameter' => $this->expectedJsonResult['diameter'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'       => 'Circle',
            'Circle_area' => $this->expectedJsonResult['area'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'            => 'Circle',
            'Circle_perimeter' => $this->expectedJsonResult['perimeter'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);
    }
}
