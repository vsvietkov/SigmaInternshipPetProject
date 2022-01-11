<?php

namespace Tests\Feature;

use Tests\TestCase;

class CircleCalculationTest extends TestCase
{
    /**
     * Test the request for circle data calculation
     */
    public function test__circleCalculationRequest()
    {
        $endpoint = '/api/calculate';
        $expectedResult = [
            'radius'    => 1,
            'diameter'  => 2,
            'area'      => pi(),
            'perimeter' => 6.283185307179586,
        ];

        $response = $this->postJson($endpoint, [
            'radius' => 1,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($endpoint, [
            'shape'  => 'Circle',
            'radius' => 1,
        ]);
        $response->assertExactJson($expectedResult);

        $response = $this->postJson($endpoint, [
            'shape'    => 'Circle',
            'radius'   => 1,
            'Circle_diameter' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($endpoint, [
            'shape'    => 'Circle',
            'radius'   => 1,
            'Circle_diameter' => 2,
        ]);
        $response->assertExactJson($expectedResult);
    }
}
