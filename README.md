# Embryo Framework 3 skeleton application
You can use this skeleton application to start working on a new Embryo Framework 3 application.

* Getting Started
    * [Requirements](#requirements)
    * [Installation](#installation)
    * [Configuration](#configuration)
    * [Directory Structure](#directory-structure)
* Concepts
    * Life Cycle
    * PSR-7
    * Middleware
    * Dependency Container
* Application
    * [Routing](#routing)
    * Middleware
    * Services
    * Controllers
    * Models
    * Views
* Package
    * Validation
    * Session
    * Cache
    * Http Client
    * Translate
    * Log
    * CORS

## Getting Started
### Requirements
* PHP >= 7.1
* URL Rewriting

### Installation
Using Composer:
```
$ composer create-project davidecesarano/embryo [my-app-name]
```

### Configuration
Embryo utilizes the DotEnv PHP library. In a fresh Embryo installation, the root directory of your application will contain a `.env.example` file. When you install Embryo via Composer, this file will automatically be renamed to `.env`. 

All variables in your `.env` files are parsed as strings, so some reserved values have been created to allow you to return a wider range of types from the env() function:

### Directory Structure
| Directory | Description                                                                                                                                                                                     |
|-----------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| app       | Contains the core code of your application.  This directory contains a variety of additional directories such as `Controllers`, `Exceptions`, `Helpers`, `Middleware`, `Models` and `Services`. |
| bootstrap | Contains the file which bootstraps the framework.  The `app.php` file contains the ,                                                                                                            |
| public    | Contains the entry point for all request (`index.php` file) and the `assets` directory for assets files.                                                                                        |
| res       | Contains the resources of your application, such as `lang` (for languages files), `views` (for views files) and `js` (for un-compiled assets files).                                            |
| routes    | Contains all of the route definitions for your application. By default, several route files are included with Laravel: web.php, api.php, console.php, and channels.php.                         |
| storage   |  Contains your logs (`logs`), compiled templates file (`views`), file based sessions (`sessions`), file caches (`cache`).                                                                       |

## Concepts
### Life Cycle
* The app is instantiated in `bootstrap/app.php` with `Embryo\Application` class. During instantiation, Embryo registers services for the dependencies (`bootstrap/services.php`), middlewares (`bootstrap/middleware.php`) and routes files (in `routes` directory). The application constructor accepts an optional settings array that configures the application’s behavior (`bootstrap/settings.php`).
* In routes file
* 

### PSR-7
Embryo supports [PSR-7](https://www.php-fig.org/psr/psr-7/) interfaces for its Request and Response objects.

### Middleware
You can run code before and after your Embryo application to manipulate the Request and Response objects as you see fit. This is called middleware.
A middleware implements the [PSR-15 Middleware Interface](https://www.php-fig.org/psr/psr-15/).

### Dependency Container
Embryo uses an dependency container to prepare, manage, and inject application dependencies. Embryo supports containers that implement [PSR-11](http://www.php-fig.org/psr/psr-11/).

## Application
### Routing
You can define application routes using methods on the Router object. Every method accepts two arguments:
* The route pattern (with optional placeholders)
* The route callback (a closure or a `class@method` string)
```php
// GET Route
$router->get('/blog/{id}', function($request, $response, $id) {
    return $response->write('This is post with id '.$id);
}
```

Embryo Routing supports GET, POST, PUT, PATCH, DELETE and OPTIONS request methods. Every request method corresponds to a method of the Router object: `get()`, `post()`, `put()`, `patch()`, `delete()` and `options()`.
You can use `all()` and `match()` methods for supporting all methods or specific route methods.

See full documentation: [Embryo Routing](https://github.com/davidecesarano/Embryo-Routing#usage).

### Middleware
In Embryo you may create a PSR-15 middleware in `app\Middleware` directory. You may add middleware to application, to specific route or to route group.

#### Application middleware
If you want register middleware for every HTTP request, add application middleware in `bootstrap\middleware.php`:

```php
    $app->addMiddleware(App\Middleware\MyCustomMiddleware::class);
```

#### Route middleware


#### Route group middleware

### Services

### Controllers

### Models

### Views