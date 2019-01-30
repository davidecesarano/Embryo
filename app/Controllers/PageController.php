<?php 
    
    /**
     * PageController
     */
    
    namespace App\Controllers;
    
    use Embryo\Controller;

    class PageController extends Controller
    {   
        public function index($name)
        {
            $view = $this->get('view');
            return $view->render($this->response, 'home', [
                'title' => trans('hello', ['name' => ucfirst($name)])
            ]);
        }
    }