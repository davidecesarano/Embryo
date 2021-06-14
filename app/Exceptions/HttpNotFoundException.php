<?php 

    /**
     * HttpNotFoundException
     */

    namespace App\Exceptions; 

    use \Exception;
    use Embryo\Facades\View; 
    use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};

    class HttpNotFoundException extends Exception
    {
        /**
         * @var string $message
         */
        protected $message = 'Not found';

        /**
         * @var int $code
         */
        protected $code = 404;
        
        /**
         * Custom renderer.
         * 
         * @param ServerRequestInterface $request 
         * @param ResponseInterface $response 
         * @return ResponseInterface
         */
        public function render(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
        {
            return View::render($response, 'errors', [
                'title' => 'Ops! '.$this->getMessage()
            ]);
        }
    }