<?php namespace App\Interfaces;

interface Shape
{
    public function calculateArea(): ?float;
    public function calculateAllAttributes(): void;
}
