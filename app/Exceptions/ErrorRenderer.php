<?php 

    /**
     * ErrorRenderer
     */

    namespace App\Exceptions;

    use \Throwable;
    use Embryo\Facades\View; 
    use Embryo\Error\Interfaces\ErrorRendererInterface;
    use Embryo\Http\Factory\ResponseFactory;
    use Psr\Http\Message\{ResponseInterface, ServerRequestInterface};

    class ErrorRenderer implements ErrorRendererInterface
    {
        /**
         * Custom renderer.
         * 
         * @param ResponseInterface $response 
         * @param Throwable $exception 
         * @return ResponseInterface
         */
        public function render(ServerRequestInterface $request, ResponseInterface $response, Throwable $exception): ResponseInterface 
        {   
            $code = $response->getStatusCode();
            
            if (method_exists($exception, 'render')) {
                $response = (new ResponseFactory)->createResponse($code);
                return $exception->render($request, $response);
            }

            if ($code >= 400 && $code <= 451) {
                $response = (new ResponseFactory)->createResponse($code);
                return View::render($response, 'errors', [
                    'title' => 'Ops! '.$exception->getMessage()
                ]);
            }

            return $response;
        }
    }