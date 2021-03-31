<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use Embryo\Controller;
    use Psr\Http\Message\ResponseInterface;
    use App\Controllers\Traits\RenderTrait;

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
            $view = $this->get('view');
            return $this->render('home', ['title' => 'Embryo 3']);
        }
    }