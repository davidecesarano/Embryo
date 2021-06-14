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
     * @param string $key
     * @return array
     */
    function settings(string $key): array
    {
        return Container::get('settings');
    }

    /**
     * Generate a fully qualified URL 
     * from to app url.
     *
     * @param string|null $path
     * @return string
     */
    function app_url(string $path = null)
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
    function app_path(string $path = null) 
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
    function app_name()
    {
        $settings = Container::get('settings');
        return $settings['app']['name'];
    }

    /**
     * Get app locale.
     *
     * @return string
     */
    function app_locale()
    {
        $settings = Container::get('settings');
        return $settings['app']['locale'];
    }

    /**
     * Get app charset.
     *
     * @return string
     */
    function app_charset()
    {
        $settings = Container::get('settings');
        return $settings['app']['charset'];
    }

    /**
     * Alias of app_url()
     *
     * @param string|null $path
     * @return string
     */
    function site_url(string $path = null)
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
    function asset(string $path, $versioning = false)
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
    function trans(string $key, array $context = [])
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
     */
    function cache()
    {
        return Container::get('cache');
    }

    /**
     * HTTP Cliente facade.
     */
    function http()
    {
        return Container::get('http');
    }

    /**
     * Logger facade.
     */
    function logger()
    {
        return Container::get('logger');
    }

    /**
     * Request facade.
     */
    function request()
    {
        return Container::get('request');
    }

    /**
     * Response facade.
     */
    function response()
    {
        return Container::get('response');
    }

    /**
     * View facade.
     */
    function view()
    {
        return Container::get('view');
    }