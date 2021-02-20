<?php 

    /** 
     * Api Routes
     * 
     * @var Embryo\Application $app 
     */

    $app->prefix('/api')->group(function($app){
        
        $app->get('/{name}', function($request, $response, $name){
            return [
                'data' => [
                    'name' => $name
                ]
            ];
        });

    });