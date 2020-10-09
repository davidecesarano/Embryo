<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use Embryo\Controller;

    class PageController extends Controller
    {   
        /**
         * Home
         */
        public function index()
        {
            $view = $this->get('view');
            return $view->render($this->response, 'home', ['title' => 'Embryo 2']);
        }
    }