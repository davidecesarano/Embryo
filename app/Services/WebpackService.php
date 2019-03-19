<?php 

    /**
     * WebpackService
     */

    namespace App\Services;

    use Embryo\Container\ServiceProvider;
    
    class WebpackService extends ServiceProvider
    {
        /**
         * Registers service provider.
         *
         * @return void
         */
        public function register()
        {
            $this->container->set('webpack', function($container){
                
                $settings = $container->get('settings');
                $site_url = $container->get('baseUrl');
                $webpack  = $settings['webpack'];
                
                if (!in_array($webpack['mode'], ['production', 'development'])) {
                    throw new \InvalidArgumentException('Webpack mode must be "development" or "production"');
                }

                return 
                    $webpack['mode'] === 'production' ? 
                    rtrim($site_url, '/').'/assets/'.ltrim($webpack['bundle'], '/') : 
                    rtrim($webpack['path'], '/').'/'.ltrim($webpack['bundle'], '/');

            });
        }
    }