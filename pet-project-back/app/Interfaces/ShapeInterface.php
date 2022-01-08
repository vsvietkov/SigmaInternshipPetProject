<?php namespace App\Interfaces;

interface ShapeInterface
{
    public function calculateArea(): ?float;
    public function calculateAllAttributes(): void;
}
