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
            $this->container->set('storage', function($container){
                $adapter = new LocalFilesystemAdapter(root_path());
                $filesystem = new Filesystem($adapter);
                return $filesystem;
            });
        }
    }