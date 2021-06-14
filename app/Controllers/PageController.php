<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use App\Controllers\Traits\RenderTrait;
    use Embryo\Controller;
    use Psr\Http\Message\ResponseInterface;

    class PageController extends Controller
    {   
        use RenderTrait;

        /**
         * Home
         * 
         * @return ResponseInterface
         */
        public function index(): ResponseInterface
        {
            return $this->render('home', ['title' => 'Embryo 3']);
        }
    }