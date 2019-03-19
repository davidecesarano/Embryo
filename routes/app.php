<?php

    $app->get('/', function($request, $response){
        $view = $this->get('view');
        return $view->render($response, 'home', ['title' => 'Embryo 2']);
    });

    $app->get('/vue', function($request, $response){

        $webpack = $this->get('webpack');
        return $this->get('view')->render($response, 'vue', ['bundle' => $webpack]);

    });

    $app->get('/controller/{name}', 'PageController@index');