<?php

namespace App\Core;
use ReflectionException;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public View $view;

    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->view = new View;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router(
            $this->request,
            $this->response,
            $this->view
        );
    }

    public function addRoute(string $method, string $path, mixed $callback): void
    {
        $this->router->addRoute($method, $path, $callback);
    }

    /**
     * @throws ReflectionException
     */
    public function registerControllers(array $controllers): void
    {
        $this->router->registerControllers($controllers);
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }

}