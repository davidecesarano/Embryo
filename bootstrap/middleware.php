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
    
    // RenderHttpErrorMiddleware
    $app->addErrorMiddleware(
        (new App\Middleware\RenderHttpErrorMiddleware)
            ->setView($view)
    );

    // SecureHeadersMiddleware
    $app->addMiddleware(App\Middleware\SecureHeadersMiddleware::class);

    // SessionMiddleware
    $app->addMiddleware(
        (new Embryo\Session\Middleware\SessionMiddleware)
            ->setName($settings['session']['name'])
            ->setOptions($settings['session']['options'])
    );

    // SetLocaleMiddleware
    $app->addMiddleware(
        (new Embryo\Translate\Middleware\SetLocaleMiddleware)
            ->setLanguage($settings['app']['locale'])
    );