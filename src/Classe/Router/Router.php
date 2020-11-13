<?php
namespace App\Classe\Router;

use AltoRouter;

class Router {

    private $viewPath;
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null)
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function post(string $url, string $view, ?string $name = null)
    {
        $this->router->map('GET | POST', $url, $view, $name);
        return $this;
    }

    public function url($query){
        $route = $this->router->generate($query);
        return $route;
    }

    public function run()
    {
        $match = $this->router->match();
        $view = $match['target'];
        $router = $this->router;
        $params = $match['params'];
        ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
        $content = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR . 'layouts/default.php';
        return $this;
    }
}