<?php namespace App\Components;

abstract class BaseShape
{
    /**
     * Get an array of all properties of the shape
     *
     * @return array
     */
    abstract public function serialize(): array;
}
