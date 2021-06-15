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
            return view('home', ['title' => 'Embryo 3']);
        }
    }