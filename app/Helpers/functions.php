<?php 

    /**
     * Helpers
     * 
     * Helper PHP function.
     * 
     * @author Davide Cesarano <davide.cesarano@unipegaso.it>
     * @link https://github.com/davidecesarano/embryo-framework
     */

    use Embryo\Facades\Container;

    /**
     * ------------------------------------------------------------
     * INFORMATION ABOUT A VARIABLE
     * ------------------------------------------------------------
     */

    /**
     * Debug for information about 
     * a variable.
     *
     * @param mixed $data
     * @return void
     */
    function debug($data)
    {
        echo '<pre>';
            print_r($data);
        echo '</pre>';
    }

    /**
     * Dumps information about a variable.
     *
     * @param mixed $data
     * @return void
     */
    function dump($data)
    {
        echo '<pre>';
            var_dump($data);
        echo '</pre>';
    }

    /**
     * ------------------------------------------------------------
     * SETTINGS APP
     * ------------------------------------------------------------
     */

    /**
     * Return setting's app array.
     * 
     * @param string|null $key
     * @return mixed
     */
    function app_settings(string $key = null)
    {
        $settings = Container::get('settings');
        if (!$key) return $settings;
        if ($key && isset($settings[$key])) return $settings[$key];
        else return NULL;
    }

    /**
     * Generate a fully qualified URL 
     * from to app url.
     *
     * @param string|null $path
     * @return string
     */
    function app_url(string $path = null): string
    {
        $url = Container::get('baseUrl');
        return (!$path) ? $url : $url.'/'.trim($path, '/');
    }

    /**
     * Generate a fully qualified path
     * from the project root.
     *
     * @param string|null $path
     * @return string
     */
    function app_path(string $path = null): string 
    {
        $settings = Container::get('settings');
        $app_path = rtrim($settings['app']['root_path'], '/'); 
        return (!$path) ? $app_path : $app_path.'/'.ltrim($path, '/');
    }

    /**
     * Get App name.
     *
     * @return string
     */
    function app_name(): string
    {
        $app = app_settings('app');
        return $app['name'];
    }

    /**
     * Get app locale.
     *
     * @return string
     */
    function app_locale(): string
    {
        $app = app_settings('app');
        return $app['locale'];
    }

    /**
     * Get app charset.
     *
     * @return string
     */
    function app_charset(): string
    {
        $app = app_settings('app');
        return $app['charset'];
    }

    /**
     * Alias of app_url()
     *
     * @param string|null $path
     * @return string
     */
    function site_url(string $path = null): string
    {
        return app_url($path);
    }

    /**
     * ------------------------------------------------------------
     * ASSETS
     * ------------------------------------------------------------
     */

    /**
     * Generate a fully qualified URL
     * from the asset resources.
     * 
     * If versioning is true, append the 
     * filemtime to query param 'v'.
     *
     * @param string $path
     * @param bool $versioning
     * @return string
     */
    function asset(string $path, $versioning = false): string
    {
        if ($versioning) {
            $res = filemtime(app_path('public/assets/'.trim($path, '/')));
            return app_url('assets/'.$path.'?v='.$res);
        } else {
            return app_url('assets/'.$path);
        }
    }

    /**
     * ------------------------------------------------------------
     * EMBRYO TRANSLATE
     * ------------------------------------------------------------
     */

    /**
     * Return message translation.
     *
     * @param string $key
     * @param array $context
     * @return string
     */
    function trans(string $key, array $context = []): string
    {
        $locale = Container::get('settings')['app']['locale'];
        $session = Container::get('request')->getAttribute('session');
        
        if ($session) {
            $language = $session->get('language', $locale);
            $messages = Container::get('translate')->getMessages($language);
            return $messages->get($key, $context);
        }
        return $key;
    }

    /**
     * ------------------------------------------------------------
     * FACADES
     * ------------------------------------------------------------
     */

    /**
     * Cache facade.
     * 
     * @return Psr\SimpleCache\CacheInterface
     */
    function cache(): Psr\SimpleCache\CacheInterface
    {
        return Container::get('cache');
    }

    /**
     * HTTP Cliente facade.
     * 
     * @return Embryo\Http\Client\ClientFactory
     */
    function http(): Embryo\Http\Client\ClientFactory
    {
        return Container::get('http');
    }

    /**
     * Logger facade.
     * 
     * @return Psr\Log\LoggerInterface
     */
    function logger(): Psr\Log\LoggerInterface
    {
        return Container::get('logger');
    }

    /**
     * Request facade.
     * 
     * @return Psr\Http\Message\ServerRequestInterface
     */
    function request(): Psr\Http\Message\ServerRequestInterface
    {
        return Container::get('request');
    }

    /**
     * Response facade.
     * 
     * @return Psr\Http\Message\ResponseInterface
     */
    function response(): Psr\Http\Message\ResponseInterface
    {
        return Container::get('response');
    }

    /**
     * Filesystem facade.
     * 
     * @return League\Flysystem\FilesystemOperator 
     */
    function storage(): League\Flysystem\FilesystemOperator 
    {
        return Container::get('storage');
    }

    /**
     * View facade.
     * 
     * @param string $template 
     * @param array $data
     * @return Psr\Http\Message\ResponseInterface
     */
    function view(string $template, array $data = []): Psr\Http\Message\ResponseInterface
    {   
        $response = response();
        return Container::get('view')->render($response, $template, $data);
    }