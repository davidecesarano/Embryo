<?php 

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */

    $app->service([
        App\Services\ServerRequestService::class,
        App\Services\ResponseService::class,
        App\Services\BaseUrlService::class,
        App\Services\BasePathService::class,
        App\Services\RequestHandlerService::class,
        App\Services\RouterService::class,
        App\Services\LoggerService::class,
        App\Services\ErrorHandlerService::class,
        App\Services\SessionService::class,
        App\Services\CacheService::class,
        App\Services\ViewService::class,
        App\Services\DatabaseService::class,
        App\Services\ValidationService::class,
        App\Services\TranslateService::class,
        App\Services\MailService::class,
        App\Services\JWTService::class
    ]);