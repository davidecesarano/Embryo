<?php 

    /**
     * Services
     * 
     * @var Embryo\Application $app
     */

    $app->service([
        Embryo\Services\ServerRequestService::class,
        Embryo\Services\ResponseService::class,
        Embryo\Services\BaseUrlService::class,
        Embryo\Services\BasePathService::class,
        Embryo\Services\RequestHandlerService::class,
        Embryo\Services\RouterService::class,
        Embryo\Services\LoggerService::class,
        Embryo\Services\ErrorHandlerService::class,
        Embryo\Services\SessionService::class,
        Embryo\Services\CacheService::class,
        Embryo\Services\ViewService::class,
        Embryo\Services\DatabaseService::class,
        Embryo\Services\ValidationService::class,
        Embryo\Services\TranslateService::class,
        Embryo\Services\HttpClientService::class,
        App\Services\MailService::class,
        App\Services\StorageService::class
    ]);