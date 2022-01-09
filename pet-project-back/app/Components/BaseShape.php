<?php namespace App\Components;

abstract class BaseShape
{
    /**
     * Get an array of all properties of the shapec
     *
     * @return array
     */
    abstract public function serialize(): array;
}
