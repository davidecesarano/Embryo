<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use Embryo\Controller;
    use Embryo\Http\Message\Response;

    class PageController extends Controller
    {
        /**
         * Home
         * 
         * @return Response
         */
        public function index(): Response
        {
            return view('home', ['title' => 'Embryo 3']);
        }
    }