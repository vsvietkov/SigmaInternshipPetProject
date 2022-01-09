<?php namespace App\Components;

class ShapeFactory
{
    /**
     * @var string
     */
    private string $namespace;

    /**
     * @param string $namespace
     */
    public function __construct(
        string $namespace = 'App\Components\Shapes'
    ) {
        $this->namespace = $namespace;
    }

    public function make(string $shapeName)
    {
        $className = $this->namespace . "\\$shapeName";

        if (class_exists($className)) {
            return new $className();
        }

        return null;
    }
}
