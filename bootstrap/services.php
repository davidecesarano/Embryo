<?php 

    /**
     * Services
     * 
     * @var Embryo\Application $app
     */

    $app->service([
        Embryo\Service\ServerRequestService::class,
        Embryo\Service\ResponseService::class,
        Embryo\Service\BaseUrlService::class,
        Embryo\Service\BasePathService::class,
        Embryo\Service\RequestHandlerService::class,
        Embryo\Service\RouterService::class,
        Embryo\Service\LoggerService::class,
        Embryo\Service\ErrorHandlerService::class,
        Embryo\Service\SessionService::class,
        Embryo\Service\CacheService::class,
        Embryo\Service\ViewService::class,
        Embryo\Service\DatabaseService::class,
        Embryo\Service\ValidationService::class,
        Embryo\Service\TranslateService::class,
        Embryo\Service\HttpClientService::class,
        App\Services\MailService::class,
        App\Services\JWTService::class,
    ]);