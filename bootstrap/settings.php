<?php 

    return [

        /*
        |--------------------------------------------------------------------------
        | App
        |--------------------------------------------------------------------------
        */

        'app' => [
            'root_path' => root_path(),
            'name'      => getenv('APP_NAME'),
            'url'       => getenv('APP_URL'),
            'path'      => getenv('APP_PATH'),
            'charset'   => 'utf-8',
            'locale'    => 'en'
        ],

        /*
        |--------------------------------------------------------------------------
        | Database
        |--------------------------------------------------------------------------
        */

        'database' => [
            'local' => [
                'engine'   => getenv('DB_ENGINE'),
                'host'     => getenv('DB_HOST'),
                'name'     => getenv('DB_NAME'),
                'user'     => getenv('DB_USER'),  
                'password' => getenv('DB_PASSWORD'),
                'charset'  => 'utf8mb4',
                'options'  => [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Errors
        |--------------------------------------------------------------------------
        */

        'errors' => [
            'displayDetails' => filter_var(getenv('ERROR_DISPLAY'), FILTER_VALIDATE_BOOLEAN),
            'logErrors'      => filter_var(getenv('ERROR_LOG'), FILTER_VALIDATE_BOOLEAN)
        ],

        /*
        |--------------------------------------------------------------------------
        | Mail
        |--------------------------------------------------------------------------
        */

        'mail' => [
            'local' => [
                'host'       => getenv('MAIL_HOST'),
                'port'       => getenv('MAIL_PORT'),
                'username'   => getenv('MAIL_USERNAME'),
                'password'   => getenv('MAIL_PASSWORD'),
                'exceptions' => true,
                'debug'      => 0,
                'html'       => true,
                'smtpsecure' => 'tls'
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Routing
        |--------------------------------------------------------------------------
        */

        'routing' => [
            'namespace' => 'App\\Controllers'
        ],

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        'view' => [
            'templatePath' => root_path('views'),
            'compilerPath' => root_path('storage/views')
        ],

        /*
        |--------------------------------------------------------------------------
        | Logger
        |--------------------------------------------------------------------------
        */

        'logger' => [
            'logPath' => root_path('storage/logs')
        ],

        /*
        |--------------------------------------------------------------------------
        | Cache
        |--------------------------------------------------------------------------
        */

        'cache' => [
            'cachePath' => root_path('storage/cache'),
            'ttl'       => 86400
        ],

        /*
        |--------------------------------------------------------------------------
        | Session
        |--------------------------------------------------------------------------
        */

        'session' => [
            'name'    => 'EMBRYO',
            'options' => [
                'use_cookies'      => false,
                'use_only_cookies' => true,
                'save_path'        => root_path('storage/sessions'),
                'cookie_lifetime'  => 86400,
                'cookie_samesite'  => 'Lax'
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Translate
        |--------------------------------------------------------------------------
        */

        'translate' => [
            'languagePath' => root_path('translations')
        ],

        /*
        |--------------------------------------------------------------------------
        | CORS
        |--------------------------------------------------------------------------
        */

        'cors' => [
            'allowed_origins'      => ['*'],
            'allowed_methods'      => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
            'allowed_headers'      => ['X-Requested-With', 'Content-Type', 'Accept', 'Origin', 'Authorization'],
            'exposed_headers'      => [],
            'max_age'              => 0,
            'supports_credentials' => false
        ]
    ];