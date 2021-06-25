<?php 

    /**
     * StorageService
     */

    namespace App\Services;

    use Embryo\Container\ServiceProvider;
    use League\Flysystem\Filesystem;
    use League\Flysystem\Local\LocalFilesystemAdapter;
    
    class StorageService extends ServiceProvider
    {
        /**
         * Registers service provider.
         *
         * @return void
         */
        public function register()
        {
            $this->container->set(Filesystem::class, function($container) {
                $settings = $container->get('settings');
                $adapter = new LocalFilesystemAdapter($settings['app']['root_path']);
                $filesystem = new Filesystem($adapter);
                return $filesystem;
            });

            $this->container->alias('storage', Filesystem::class);
        }
    }