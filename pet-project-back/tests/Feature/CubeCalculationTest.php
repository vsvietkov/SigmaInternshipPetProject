<?php

namespace Tests\Feature;

use Tests\BaseShapeFeatureTest;

class CubeCalculationTest extends BaseShapeFeatureTest
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint           = '/api/calculate';
        $this->expectedJsonResult = [
            'side'          => 3,
            'diagonalSmall' => 4.242640687119286,
            'diagonalBig'   => 5.196152422706632,
            'area'          => 54,
            'volume'        => 27,
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
            'shape'              => 'Cube',
            'side'               => $this->expectedJsonResult['side'],
            'Cube_diagonalSmall' => 3,
        ]);
        $response->assertStatus(422);

        $response = $this->postJson($this->endpoint, [
            'shape'           => 'Cube',
            'side'            => $this->expectedJsonResult['side'],
            'Cube_diagonalSmall'   => $this->expectedJsonResult['diagonalSmall'],
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
            'shape' => 'Cube',
            'side'  => $this->expectedJsonResult['side'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'              => 'Cube',
            'Cube_diagonalSmall' => $this->expectedJsonResult['diagonalSmall'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'     => 'Cube',
            'Cube_area' => $this->expectedJsonResult['area'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);

        $response = $this->postJson($this->endpoint, [
            'shape'          => 'Cube',
            'Cube_volume' => $this->expectedJsonResult['volume'],
        ]);
        $response->assertExactJson($this->expectedJsonResult);
    }
}
