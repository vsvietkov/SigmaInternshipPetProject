## <p align="center">Sigma Internship Pet-Project</p>

This is a small project the main aim of which is to demonstrate my knowledge and ability to use *Object-Oriented Design* on practice.

A program provides a simple calculator for basic geometry figures like Circle, Sphere etc. You need to enter at least one shape characteristic to get the calculation results.

![Screenshot from 2022-01-14 11-14-13](https://user-images.githubusercontent.com/95583010/149490178-23b75c1a-be93-467a-9e33-089077d3f2c3.png)

### Installation
1. Go to **pet-project-back** folder and run next commands:

    - `composer install`
    - `cp .env.example .env`
    - `php artisan key:generate`
    - `php artisan serve`

2. In a new terminal window go to **pet-project-front** folder and run next commands:

    - `npm install`
    - `npm start` - This will open a page in your default browser.
## <p align="center">SOLID</p>
### Single-responsibility
It is very problematic to implement all ways of calculations output for every figure (consider that in future there will
be more than one option), so the `app/Components/CalculationsOutputter` class was created with a single aim - to output
the calculations:
```php
class CalculationsOutputter
{
    /**
     * @var BaseShape
     */
    private BaseShape $shape;

    public function __construct(BaseShape $shape)
    {
        $this->shape = $shape;
    }

    /**
     * Get the calculated results
     * 
     * @return array
     */
    public function output()
    {
        return $this->shape->serialize();
    }
}
```
### Open-closed
Every shape implements `calculateAllAttributes` and `serialize` methods which can be reused in future by many classes
without the necessity to check the figure type to perform calculations and output. The use of `serialize` method was
already shown in the "Single responsibility" section.
### Interface Segregation
Geometrical figures can be two-dimensional and three-dimensional and thus have different characteristics. So, it will be
convenient to use different interfaces for such shapes:
```php
interface Shape2DInterface
{
    public function calculatePerimeter(): ?float;
}

interface Shape3DInterface
{
    public function calculateVolume(): ?float;
}
```
### Dependency Inversion
`app/Components/CalculationOutputter` class does not care what shape we passed into it as long as all classes inherited
from `app/Components/BaseShape` have all necessary methods.
```php
class CalculationsOutputter
{
    /**
     * @var BaseShape
     */
    private BaseShape $shape;

    public function __construct(BaseShape $shape)
    {
        $this->shape = $shape;
    }
    ...
}
 ```
## <p align="center">OOP principles</p>
### Encapsulation
Each figure has its characteristics as `private` and it is required to use getters to access them:
```php
 /**
  * @var float|null
  */
 private ?float $side;

 /**
  * @var float|null
  */
 private ?float $diagonal;

 /**
  * @return float|null
  */
 public function getSide(): ?float
 {
     return $this->side;
 }

 /**
  * @return float|null
  */
 public function getDiagonal(): ?float
 {
     return $this->diagonal;
 }
```
### Inheritance
Taking into account that every custom rule has the same error message format, an abstract class that implements this
message is used:
```php
abstract class BaseRule implements Rule
{
    /**
     * @var string
     */
    protected string $relatedValue;

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return "A value does not coincide with given $this->relatedValue.";
    }
}
```
In a rule, we set the related characteristic name and if it fails the check, a message will have this characteristic's
name:
```php
class SquareAreaRule extends BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $square = null;
        if (request()->input('side')) {
            $this->relatedValue = 'side';
            $square = new Square(floatval(request()->input('side')));
        } ...
        
        return is_null($square) || floatval($value) === $square->calculateArea();
    }
}
```
### Polymorphism
Every shape class is inherited from the `app/Components/BaseShape` class and has to implement the `serialize` method,
which simply returns the shape's characteristics as an array:
```php
abstract class BaseShape
{
    /**
     * Get an array of all properties of the shape
     *
     * @return array
     */
    abstract public function serialize(): array;
}

class Square extends BaseShape implements ShapeInterface, Shape2DInterface
{
    ...
    
    /**
     * @return array
     */
    public function serialize(): array
    {
        return [
            'side'      => $this->side,
            'diagonal'  => $this->diagonal,
            'area'      => $this->area,
            'perimeter' => $this->perimeter,
        ];
    }
}
```
## <p align="center">Factory Pattern</p>
Taking into account that an application can have lots of geometrical figures, it can be problematic to write new
generator lines for each of them. So, `app/Components/ShapeFactory` class that follows a Factory Pattern was created.

```php
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
```

The above function takes as an argument the name of figure class and tries to create it. If there is no such class in
the defined namespace, a custom exception will be thrown. This allows to freely expand the project and catch errors.
