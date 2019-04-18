<?php
    
    /*
    |--------------------------------------------------------------------------
    | PSR-15 Middleware
    |--------------------------------------------------------------------------
    */

    $container = $app->getContainer();
    $settings  = $container['settings'];
    $error     = $container['errorHandler'];
    $view      = $container['view'];
    $session   = $container['session'];
    
    // RenderHttpErrorMiddleware
    $app->addMiddleware(
        (new App\Middleware\RenderHttpErrorMiddleware)
            ->setView($view)
    );

    // ErrorHandlerMiddleware
    $app->addMiddleware(
        (new Embryo\Error\Middleware\ErrorHandlerMiddleware)
            ->setErrorHandler($error)
    );

    // SecureHeadersMiddleware
    $app->addMiddleware(App\Middleware\SecureHeadersMiddleware::class);

    // SessionMiddleware
    $app->addMiddleware(
        (new Embryo\Session\Middleware\SessionMiddleware)
            ->setSession($session)
            ->setName($settings['session']['name'])
            ->setOptions($settings['session']['options'])
    );

    // CsrfMiddleware
    $app->addMiddleware(Embryo\CSRF\CsrfMiddleware::class);

    // SetLocaleMiddleware
    $app->addMiddleware(
        (new Embryo\Translate\Middleware\SetLocaleMiddleware)
            ->setLanguage($settings['app']['locale'])
    );

    // MinifyHtmlMiddleware
    $app->addMiddleware(Embryo\View\Middleware\MinifyHtmlMiddleware::class);