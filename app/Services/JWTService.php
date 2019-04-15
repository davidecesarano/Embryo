<?php 

    /**
     * JWTService
     */

    namespace App\Services;

    use Embryo\Container\ServiceProvider;
    use App\Helpers\JWT;
    
    class JWTService extends ServiceProvider
    {
        /**
         * Registers service provider.
         *
         * @return void
         */
        public function register()
        {
            $this->container->set('jwt', function($container){
                $jwt = $container['settings']['jwt'];
                return new JWT($jwt['secret_key'], $jwt['iss'], $jwt['nbf'], $jwt['exp']);
            });
        }
    }