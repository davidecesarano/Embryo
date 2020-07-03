<?php

    /**
     * PHP internal web server from Laravel.
     *
     * @see https://github.com/laravel/laravel/blob/master/server.php
     * @author Taylor Otwell <taylor@laravel.com>
     */

    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );

    if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
        return false;
    }

    require_once __DIR__.'/public/index.php';