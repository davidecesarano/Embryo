<?php 

    /**
     * RenderTrait
     */

    namespace App\Controllers\Traits;

    use Embryo\Facades\View;
    use Psr\Http\Message\ResponseInterface;

    trait RenderTrait 
    {
        /**
         * Render view.
         * 
         * @param string $template 
         * @param array $data 
         * @param ResponseInterface $response 
         * @return ResponseInterface
         */
        public function render(string $template, array $data = [], ResponseInterface $response = null): ResponseInterface
        {
            $response = $response ? $response : $this->response();
            return View::render($response, $template, $data);
        }
    }