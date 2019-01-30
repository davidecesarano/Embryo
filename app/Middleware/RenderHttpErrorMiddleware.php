<?php 

    /**
     * RenderHttpErrorMiddleware
     */

    namespace App\Middleware;
    
    use Embryo\View\View;
    use Embryo\Http\Factory\ResponseFactory;
    use Embryo\Routing\Exceptions\{MethodNotAllowed, NotFoundException};
    use Psr\Http\Message\ServerRequestInterface;
    use Psr\Http\Message\ResponseInterface;
    use Psr\Http\Server\MiddlewareInterface;
    use Psr\Http\Server\RequestHandlerInterface;

    class RenderHttpErrorMiddleware implements MiddlewareInterface 
    {   
        /**
         * @var View $view
         */
        private $view;

        /**
         * Set view for rendering.
         *
         * @param View $view
         * @return self
         */
        public function setView(View $view): self
        {
            $this->view = $view;
            return $this;
        }

        /**
         * Process a server request and return a response.
         *
         * @param ServerRequestInterface $request
         * @param RequestHandlerInterface $handler
         * @return ResponseInterface
         */
        public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
        {
            $response = $handler->handle($request);

            try {
                if ($response->getStatusCode() >= 400 && $response->getStatusCode() <= 451) {
                    return $this->render($response->getStatusCode(), $response->getReasonPhrase());
                }
                return $response;
            } catch (NotFoundException $e) {
                return $this->render(404, $response->getMessage());
            } catch (MethodNotAllowed $e) {
                return $this->render(405, $response->getMessage());
            }            
        }
        
        /**
         * Render html error page.
         *
         * @param int $code
         * @param string $message
         * @return ResponseInterface
         */
        private function render(int $code, string $message): ResponseInterface
        {
            return $this->view->render(
                (new ResponseFactory)->createResponse($code), 
                'errors',
                ['title' => 'Ops! '.$message]
            );
        }
    }