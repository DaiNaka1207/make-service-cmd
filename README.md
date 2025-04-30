# Desciption
Create a new service class and service interface

# Install
```bash
composer require dainaka/make-service-cmd
```

# Suggest
[@wxfpk432](https://x.com/wxfpk432)


# Usage
```bash
$ php artisan make:service {name : Create a service class}
```

# Example

## Create a service class
```bash
$ php artisan make:service ExampleService
```

```php
<?php
// app/Http/Services/ExampleService.php

namespace App\Services;

class ExampleService
{
    public function __construct()
    {
        //
    }

    public function exampleMethod() : void
    {
        //
    }
}
```
