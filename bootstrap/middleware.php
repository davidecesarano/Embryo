<?php
    
    /** 
     * PSR-15 Middleware
     * 
     * @var Embryo\Application $app 
     */

    $container = $app->getContainer();
    $settings  = $container->get('settings');
    
    // ErrorHandlerMiddleware
    $app->addErrorMiddleware(App\Exceptions\ErrorRenderer::class);

    // CorsMiddleware
    $app->addMiddleware(
        (new Embryo\CORS\CorsMiddleware)
            ->setAllowedOrigins($settings['cors']['allowed_origins'])
            ->setAllowedMethods($settings['cors']['allowed_methods'])
            ->setAllowedHeaders($settings['cors']['allowed_headers'])
            ->setExposedHeaders($settings['cors']['exposed_headers'])
            ->setMaxAge($settings['cors']['max_age'])
            ->setSupportsCredentials($settings['cors']['supports_credentials'])
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