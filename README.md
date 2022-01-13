## Sigma Internship Pet-Project

This is a small project the main aim of which is to demonstrate my knowledge and ability to use *Object-Oriented Design* on practice.

A program provides a simple calculator for basic geometry figures like Circle, Sphere etc. You need to enter at least one shape characteristic to get the calculation results.

### Installation
1. Go to **pet-project-back** folder and run next commands:

    - `composer install`
    - `cp .env.example .env`
    - `php artisan key:generate`
    - `php artisan serve`

2. In a new terminal window go to **pet-project-front** folder and run next commands:

    - `npm install`
    - `npm start` - This will open a page in your default browser.

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