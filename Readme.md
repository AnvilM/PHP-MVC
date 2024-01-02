# About

PHP MVC API Framework
For more see [Documentation](https://anvilm.github.io/)

## Install

```bash
composer create-project anvilm/PHP-MVC
```

## Getting started


### Routing

All routes are registered in the file routes/Routes.php.
This example initializes the Home route with the Home [controller](#controllers), Index [action](#actions) and GET method.

```php
$Route->Add()->get('/home')->controller(HomeController::class)->action('IndexAction');
```

### Controllers

All controllers are stored in app/controllers/
All controllers must be specified in the [routes](#routing).

```php
namespace App\Controllers;

class UserController extends Controller
{
    public function IndexAction()
    {
        ...
    }
}
```

### Actions

All actions must be specified in the [routes](#routing).

```php
namespace App\Controllers;

class UserController extends Controller
{
    ...

    public function Index()
    {
        ...
    }
}
```
### Middlewares

To use middleware for a [route](#routing), you need to specify the middleware to be used in the [route](#routing), and then create it in the middlewares folder.

All middlewares must be specified in the [routes](#routing).

```php
[
    "URI" => '/home',
    "Method" => 'GET',
    "Controller" => "App\Controllers\HomeController",
    "Action" => "IndexAction",
    "Middleware" => [
        'App\Middlewares\HomeMiddleware'
    ]
]
```
All middlewares are stored in app/middlewares/

```php
namespace App\Middlewares;

class AuthMiddleware
{
    public function __construct()
    {
        return $auth ? true : false;
    }
}
```

### Models

All models are stored in src/models/

```php
namespace App\Models;

use Src\Database\Model;

class UserModel extends Model
{
    public function Index()
    {
        $this->Query(...);
    }
}
```



### Helpers

All App Helpers are stored in src/helpers/

```php
function debug($data)
{
    var_dump($data);
    exit();
}
```

All App Helpers must be specified in the config/helpers.php file.

```php
return 
[
    'Env',
    'Dev'
];
```



### Env
.env is a file in which you can store all the necessary environment variables.
To get the value of a variable from .env, you can use the existing ENV [Helper](#helpers) or use your own

```php
DB_HOST = "localhost"
DB_PORT = "3306"
DB_DATABASE = "ghosty"
DB_USERNAME = "root"
DB_PASSWORD = "root"
```
To get the value of a variable from .env use
```php
$AppName = env("APP_NAME");
```
