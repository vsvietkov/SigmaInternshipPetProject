<?php namespace App\Components;

use App\Exceptions\NoSuchShapeException;
use App\Interfaces\ShapeInterface;
use function PHPUnit\Framework\throwException;

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

    /**
     * @param  string $shapeName
     * @return BaseShape
     * @throws NoSuchShapeException
     */
    public function make(string $shapeName): BaseShape
    {
        $className = $this->namespace . "\\$shapeName";

        if (class_exists($className)) {
            return new $className();
        }

        throw new NoSuchShapeException;
    }
}
