<?php

namespace Tests\Feature;

use Tests\BaseShapeFeatureTest;

class SquareCalculationTest extends BaseShapeFeatureTest
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint           = '/api/calculate';
        $this->expectedJsonResult = [
            'side'    => 2,
            'diagonal'  => 2.8284271247461903,
            'area'      => 4,
            'perimeter' => 8,
        ];
    }

    /**
     * Test the request for square data calculation
     *
     * @return void
     */
    public function test__squareCalculationRequest()
    {
        $response = $this->postJson($this->endpoint, [
            'side' => 1,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Square',
            'side'            => $this->expectedJsonResult['side'],
            'Square_diagonal' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Square',
            'side'            => $this->expectedJsonResult['side'],
            'Square_diagonal' => $this->expectedJsonResult['diagonal'],
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
            'shape' => 'Square',
            'side'  => $this->expectedJsonResult['side'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Square',
            'Square_diagonal' => $this->expectedJsonResult['diagonal'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'       => 'Square',
            'Square_area' => $this->expectedJsonResult['area'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'            => 'Square',
            'Square_perimeter' => $this->expectedJsonResult['perimeter'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);
    }
}
