# Embryo Framework 2 skeleton application
You can use this skeleton application to start working on a new Embryo Framework 2 application.

* Getting Started
    * [Requirements](#requirements)
    * [Installation](#installation)
    * [Configuration](#configuration)
    * [Directory Structure](#directory-structure)
* Concepts
    * Life Cycle
    * PSR-7 (Request and Response)
    * PSR-15 (Middleware)
    * Dependency Container
* Basics
    * [Routing](#routing)
    * Middleware
    * Services
    * Controllers
    * Models
    * Views
* Package
    * Validation
    * CSRF
    * Session
    * Cache
    * Helpers
* Frontend
    * Working with Vue.js
    * Server Side Rendering

## Requirements
* PHP >= 7.1
* URL Rewriting

## Installation
Using Composer:
```
$ composer create-project davidecesarano/embryo [my-app-name]
```

## Configuration
Embryo utilizes the DotEnv PHP library. In a fresh Embryo installation, the root directory of your application will contain a `.env.example` file. When you install Embryo via Composer, this file will automatically be renamed to `.env`. 

All variables in your `.env` files are parsed as strings, so some reserved values have been created to allow you to return a wider range of types from the env() function:

## Directory Structure
| Directory 	| Description                                                                                                                                                                	|
|-----------	|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------	|
| app       	| Contains the core code of your application. <br>This directory contains a variety of additional directories such as `Controllers`, `Helpers`, `Middleware`, `Models` and `Services`.|
| bootstrap 	| Contains the file which bootstraps the framework. <br> The `app.php` file contains the ,                                                                                  
| public    	| Contains the entry point for all request (`index.php` file) and the `assets` directory for assets files.                                                                                                                                                                          	|
| res       	| Contains the resources of your application, such as `lang` (for languages files), `views` (for views files) and `js` (for un-compiled assets files).                                                                                                                                                                          	|
| routes    	|  Contains the route files. By default,                                                                                                                                                                           	|
| storage   	|                                                                                                                                                                            	|

## Life Cycle
* The app is instantiated in `bootstrap/app.php` with `Embryo\Application` class. During instantiation, Embryo registers services for the dependencies (`bootstrap/services.php`), middlewares (`bootstrap/middleware.php`) and routes files (in `routes` directory). The application constructor accepts an optional settings array that configures the application’s behavior (`bootstrap/settings.php`).
* In routes file
* 

## PSR-7 (Request and Response)
Embryo supports PSR-7 interfaces for its Request and Response objects.
See full documentation: [Embryo Http](https://github.com/davidecesarano/Embryo-Http)

## PSR-15
Embryo supports PSR-15 interfaces for its Request and Response objects.

## Dependency Container

## Routing
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

## Middleware
In Embryo you may create a PSR-15 middleware in `app\Middleware` directory. You may add middleware to application, to specific route or to route group.

### Application middleware
If you want register middleware for every HTTP request, add application middleware in `bootstrap\middleware.php`:

```php
    $app->addMiddleware(App\Middleware\MyCustomMiddleware::class);
```

### Route middleware


### Group middleware


## Working with Vue.js
All of the JavaScript dependencies required by your application can be found in the package.json file in the project's root directory. 
You can install these dependencies using the Node package manager (NPM):
```
$ npm install
```

### Server Side Rendering