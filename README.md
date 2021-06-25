# Embryo Framework 3 skeleton application
You can use this skeleton application to start working on a new Embryo Framework 3 application.

* Getting Started
    * [Requirements](#requirements)
    * [Installation](#installation)
    * [Configuration](#configuration)
    * [Directory Structure](#directory-structure)
* Concepts
    * [Life Cycle](#life-cycle)
    * [PSR-7](#psr-7)
    * [Middleware](#middleware)
    * [Dependency Container](#dependency-container)
* Application
    * [Routing](#routing)
    * [Middleware](#middleware)
    * Controllers
    * Models
    * Views
    * Services
* Package
    * Validation
    * Session
    * Cache
    * Http Client
    * Translation
    * Logger
    * CORS
    * Storage

## Getting Started
### Requirements
* PHP >= 7.2
* URL Rewriting

### Installation
Using Composer:
```
$ composer create-project davidecesarano/embryo [my-app-name]
```

### Configuration
Embryo utilizes the [DotEnv](https://github.com/vlucas/phpdotenv) PHP library. In a fresh Embryo installation, the root directory of your application will contain a `.env.example` file. When you install Embryo via Composer, this file will automatically be renamed to `.env`. 

### Directory Structure
| Directory    | Description                                                                                                                                                                                     |
|--------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| app          | Contains the core code of your application.  This directory contains a variety of additional directories such as `Controllers`, `Exceptions`, `Helpers`, `Middleware`, `Models` and `Services`. |
| bootstrap    | Contains the files which bootstraps your application such as app instantiation, middleware, services and settings.                                                                              |
| public       | Contains the entry point for all request (`index.php` file) and the `assets` directory.                                                                                                         |
| routes       | Contains all of the route definitions for your application. By default, several route files are included with Embryo: `app.php` and `api.php`.                                                  |
| storage      | Contains your logs (`logs`), compiled templates file (`views`), file based sessions (`sessions`), caches files (`cache`).                                                                       |
| translations | Contains your language files.                                                                                                                                                                   |
| views        | Contains the views files.                                                                                                                                                                       |

## Concepts
### Life Cycle
* The app is instantiated in `bootstrap/app.php` with `Embryo\Application` class. During instantiation, Embryo registers services for the dependencies (`bootstrap/services.php`), middlewares (`bootstrap/middleware.php`) and routes files (in `routes` directory). The application constructor accepts an optional settings array that configures the application’s behavior (`bootstrap/settings.php`).
* In `routes` direcotry define routes using the application instance’s routing methods. These instance methods register a route with the application’s Router object. Each routing method returns the Route instance so you can immediately invoke the Route instance’s methods to add middleware or assign a name.
* In `public/index.php` invoke the application instance's `run()` method. This method starts the following process:
    * enter in middleware stack;
    * run application (dispatches the current HTTP request to the appropriate application route object);
    * exit middleware stack;
    * send HTTP response.

### PSR-7
Embryo supports [PSR-7](https://www.php-fig.org/psr/psr-7/) interfaces for its Request and Response objects.

### Middleware
You can run code before and after your Embryo application to manipulate the Request and Response objects as you see fit. This is called middleware.
A middleware implements the [PSR-15 Middleware Interface](https://www.php-fig.org/psr/psr-15/).

### Dependency Container
Embryo uses an dependency container to prepare, manage, and inject application dependencies. Embryo supports containers that implement [PSR-11](http://www.php-fig.org/psr/psr-11/).

## Application
### Routing
You can define application routes using the application instance’s routing methods. Every method accepts two arguments:
* The route pattern (with optional placeholders)
* The route callback (a closure, a `class@method` string or a  `['class', 'method']` array)
```php
use Embryo\Http\Message\{Response, ServerRequest};

// GET Route
$app->get('/blog/{id}', function(ServerRequest $request, Response $response, int $id) {
    return $response->write('This is post with id '.$id);
}
```

Embryo Routing supports GET, POST, PUT, PATCH, DELETE and OPTIONS request methods. Every request method corresponds to a method of the Router object: `get()`, `post()`, `put()`, `patch()`, `delete()` and `options()`.
You can use `all()` and `map()` methods for supporting all methods or specific route methods.

See full documentation: [Embryo Routing](https://github.com/davidecesarano/Embryo-Routing#usage).

#### Register route files
All Embryo routes are defined in your route files, which are located in the `routes` directory. These files are automatically loaded by your application in `boostrap/app.php` file.
If you want create new ruote file, add it in routes directory and register it in `import()` method of the application instance in `boostrap/app.php` file:
```php
$app->import([
    root_path('bootstrap/services.php'),
    root_path('bootstrap/middleware.php'),
    root_path('routes/api.php'),
    root_path('routes/app.php')
    root_path('routes/my_route_file.php')
]);
```

### Middleware
In Embryo you may create a PSR-15 middleware in `app\Middleware` directory. You may add middleware to application, to specific route or to route group.

#### Application middleware
If you want register middleware for every HTTP request, add application middleware in `bootstrap\middleware.php`. The `addMiddleware()` method accepts a string, an array or an instance of `Psr\Http\Server\MiddlewareInterface`.

```php
$app->addMiddleware(App\Middleware\MyCustomMiddleware::class);
```

#### Route middleware
You can use the `middleware()` method to assign one or more middleware at the route. The `middleware()` method accepts a string, an array or an instance of `Psr\Http\Server\MiddlewareInterface`.
```php
$app->get('/users', function(ServerRequest $request, Response $response) {
    //...
})->middleware('App\MiddlewareTestMiddleware1::class', 'App\MiddlewareTestMiddleware2::class');
```
#### Route group middleware
In addition to the routes, you can assign one or more middleware to a group and to individual routes within the group. The `middleware()` method accepts a string, an array or an instance of `Psr\Http\Server\MiddlewareInterface`.
```php
$app->prefix('/api')->middleware(App\Middleware\GroupMiddlewareTest::class)->group(function($app) {
    $app->get('/user/{id}', function(ServerRequest $request, Response $response, int $id) {
        //...
    })->middleware(App\Middleware\RouteMiddlewareTest::class);
});
```
### Controllers
Instead of defining all of your request handling logic as closures in your route files, you may wish to organize this behavior using "controller" classes.
Let's take a look at an example of a basic controller. Note that the controller extends the base controller class included with Embryo:
```php
namespace App\Controllers;

use Embryo\Controller;
use Embryo\Http\Message\Response;

class UserController extends Controller
{
    /**
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->response()->write($id);
    }
}
```
You can define a route to this controller method like so:
```php
use App\Controllers\UserController;

$app->get('/user/{id}', [UserController::class, 'show']);
```
Controllers are **required** to extend a base class. However, you will not have access to features such as the `get()`, `request()` and `response()` methods.

#### Dependency Injection & Controllers
You are able to type-hint any dependencies your controller may need in its constructor. The declared dependencies will automatically be resolved and injected into the controller instance:
```php
namespace App\Controllers;

use Embryo\Controller;
use Path\To\Service;

class UserController extends Controller
{
    /**
     * @var Service $service
     */
    private $service;

    /**
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
```
In addition to constructor injection, you may also type-hint dependencies on your controller's methods:
```php
namespace App\Controllers;

use Embryo\Controller;
use Embryo\Http\Message\ServerRequest;

class UserController extends Controller
{
    /**
     * @param ServerRequest $request
     */
    public function store(ServerRequest $request)
    {
        //...
    }
}
```
In addition, you may also to use the `get()` method of the base controller class:
```php
namespace App\Controllers;

use Embryo\Controller;
use Path\To\Service;

class UserController extends Controller
{
    public function show()
    {
       $service = $this->get(Service::class);
       //...
    }
}
```
Base controller class also has access to PSR-7 `request()` and `response()` methods:
```php
namespace App\Controllers;

use Embryo\Controller;
use Embryo\Http\Message\Response;

class UserController extends Controller
{
    /**
     * @return Response
     */
    public function store(): Response
    {
       $params = $this->request()->getParsedBody();
       //...
       return $this->response()->write('Hello!');
    }
}
```
### Services

### Models

### Views