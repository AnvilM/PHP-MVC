<p align="center"><img src="logo.svg" width="200"></p>

# About

PHP MVC Framework

## Install

```bash
composer create-project anvilm/PHP-MVC
```

## Getting started

### Routing

All routes are registered in the file srs/config/routes.php.
This example initializes the Home route with the Home [controller](#controllers), Index [action](#actions) and Index [View](#views).
```php
$routes = [
    [
        'Route' => '/home',
        'Controller' => 'Home',
        'Action' => 'Index',
        'View' => 'Index',
    ],
];
```

### Controllers

All controllers are stored in src/controllers/
All controllers must have a postfix Controller and be specified in the [routes](#routing).

```php
namespace src\controllers;

use src\core\Controller;

class UserController extends Controller
{
    public function IndexAction()
    {
        ...
    }
}
```

### Actions

All actions must have a postfix Action and be specified in the [routes](#routing).

```php
namespace src\controllers;

use src\core\Controller;

class UserController extends Controller
{
    ...

    public function IndexAction()
    {
        ...
    }
}
```
### Middlewares

To use middleware for a [route](#routing), you need to specify the middleware to be used in the [route](#routing), and then create it in the middlewares folder.

All middlewares must have a postfix Middleware and be specified in the [routes](#routing).

routes.php
```php
$routes = [
    [
        'Route' => '/account',
        'Controller' => 'Account',
        'Action' => 'Show',
        'Middlewares' => [
            'Auth',
            'Admin'
        ]
    ],
];
```

AuthMiddleware.php
```php
namespace src\middlewares;

class AuthMiddleware{
    public function __construct(){
        return $auth ? true : false
    }
}
```

### Libraries
You can add your own libraries to the lib folder to use in your code.
For example, an already existing class for using the MySql database.

Db.php
```php
namespace src\lib;

use mysqli;

class Db{
    protected $db;
    public function __construct(){
        $DB_HOST = Env::get('DB_HOST');
        $DB_USER = Env::get('DB_USER');
        $DB_PASSWORD = Env::get('DB_PASSWORD');
        $DB_NAME = Env::get('DB_NAME');
        $this->db = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    }
    public function query($req){
        $req = $this->db->query($req);
        return $req;
    }
}
```
To use them in your code, simply initialize the class object.

UserController.php
```php
namespace src\controllers;

use src\core\Controller;
use src\lib\Db;

class UserController extends Controller
{

    public function IndexAction()
    {
        $DB = new DB();
        $DB->query("...");
    }
}
```

### Models

All models are stored in src/models/
All models must have a postfix Model.

```php
namespace src\models;

use src\core\Model;
use src\lib\Db;

class UserModel extends Model
{
    public function getUsers($id)
    {
        $Db = new Db();
        return $Db->query("...");
    }
}
```

### Env
.env is a json file in which you can store all the necessary environment variables in json format.
To get the value of a variable from .env, you can use the existing ENV [library](#libraries) or use your own

```json
{
    "APP_NAME": "name",

    "DB_HOST": "localhost",
    "DB_USER": "root",
    "DB_PASSWORD": "",
    "DB_NAME": "name"
}
```
To get the value of a variable from .env use
```php
use src\lib\Env;

...

$appName = Env::get("APP_NAME");

...
```
### Views

All views are stored in resources/views/
All views must to be specified in the routes.
To display html pages, the <a href="https://www.smarty.net/">Smarty</a> template engine is used, with which you can use layouts, etc.

