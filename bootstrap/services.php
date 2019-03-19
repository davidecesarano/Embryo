<?php 

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    $app->service(Embryo\Services\ServerRequestService::class);
    $app->service(Embryo\Services\ResponseService::class);
    $app->service(Embryo\Services\BaseUrlService::class);
    $app->service(Embryo\Services\BasePathService::class);
    $app->service(Embryo\Services\RequestHandlerService::class);
    $app->service(Embryo\Services\RouterService::class);
    $app->service(Embryo\Services\LoggerService::class);
    $app->service(Embryo\Services\ErrorHandlerService::class);
    $app->service(Embryo\Services\SessionService::class);
    $app->service(Embryo\Services\CacheService::class);
    $app->service(Embryo\Services\ViewService::class);
    $app->service(Embryo\Services\DatabaseService::class);
    $app->service(Embryo\Services\ValidationService::class);
    $app->service(Embryo\Services\TranslateService::class);
    $app->service(App\Services\MailService::class);
    $app->service(App\Services\WebpackService::class);