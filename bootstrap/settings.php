<?php 

    return [

        /*
        |--------------------------------------------------------------------------
        | App
        |--------------------------------------------------------------------------
        */

        'app' => [
            'root_path' => ROOT_PATH,
            'name'      => getenv('APP_NAME', 'Embryo'),
            'url'       => getenv('APP_URL', 'localhost'),
            'path'      => getenv('APP_PATH', ''),
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
                'engine'   => getenv('DB_ENGINE', 'mysql'),
                'host'     => getenv('DB_HOST', '127.0.0.1'),
                'name'     => getenv('DB_NAME', ''),
                'user'     => getenv('DB_USER', ''),  
                'password' => getenv('DB_PASSWORD', ''),
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
            'displayDetails' => getenv('ERROR_DISPLAY', true),
            'logErrors'      => getenv('ERROR_LOG', true)
        ],

        /*
        |--------------------------------------------------------------------------
        | Mail
        |--------------------------------------------------------------------------
        */

        'mail' => [
            'local' => [
                'host'       => getenv('MAIL_HOST', ''),
                'port'       => getenv('MAIL_PORT', ''),
                'username'   => getenv('MAIL_USERNAME', ''),
                'password'   => getenv('MAIL_PASSWORD', ''),
                'exceptions' => true,
                'debug'      => 2,
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
            'templatePath' => ROOT_PATH.'res/views',
            'compilerPath' => ROOT_PATH.'storage/views'
        ],

        /*
        |--------------------------------------------------------------------------
        | Logger
        |--------------------------------------------------------------------------
        */

        'logger' => [
            'logPath' => ROOT_PATH.'storage/logs'
        ],

        /*
        |--------------------------------------------------------------------------
        | Cache
        |--------------------------------------------------------------------------
        */

        'cache' => [
            'cachePath' => ROOT_PATH.'storage/cache',
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
                'use_only_cookies' => true
            ]
        ],

        /*
        |--------------------------------------------------------------------------
        | Translate
        |--------------------------------------------------------------------------
        */

        'translate' => [
            'languagePath' => ROOT_PATH.'res/lang'
        ]
    ];