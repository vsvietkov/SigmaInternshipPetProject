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

### OOP principles


### Factory Pattern
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