<?php

namespace Tests\Feature;

use Tests\BaseShapeFeatureTest;

class SphereCalculationTest extends BaseShapeFeatureTest
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint           = '/api/calculate';
        $this->expectedJsonResult = [
            'radius'   => 1,
            'diameter' => 2,
            'area'     => 12.566370614359172,
            'volume'   => 4.1887902047863905,
        ];
    }

    /**
     * Test the request for sphere data calculation
     *
     * @return void
     */
    public function test__sphereCalculationRequest()
    {
        $response = $this->postJson($this->endpoint, [
            'radius' => 1,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Sphere',
            'radius'          => $this->expectedJsonResult['radius'],
            'Sphere_diameter' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Sphere',
            'radius'          => $this->expectedJsonResult['radius'],
            'Sphere_diameter' => 2,
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
            'shape'  => 'Sphere',
            'radius' => $this->expectedJsonResult['radius'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Sphere',
            'Sphere_diameter' => $this->expectedJsonResult['diameter'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'        => 'Sphere',
            'Sphere_area'  => $this->expectedJsonResult['area'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'          => 'Sphere',
            'Sphere_volume'  => $this->expectedJsonResult['volume'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);
    }
}
