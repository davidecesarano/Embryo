<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use Embryo\Controller;
    use Psr\Http\Message\ResponseInterface;

    class PageController extends Controller
    {   
        /**
         * Home
         * 
         * @return ResponseInterface
         */
        public function index(): ResponseInterface
        {
            $view = $this->get('view');
            return $view->render($this->response, 'home', ['title' => 'Embryo 2']);
        }
    }