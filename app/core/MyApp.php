<?php

namespace app\core;

use Exception;
use app\interfaces\ControllerInterface;

class MyApp
{
    private $controller;

    public function __construct(private ControllerInterface $controllerInterface) {}

    public function controller()
    {
        $controller = $this->controllerInterface->controller();
        $method = $this->controllerInterface->method($controller);
        $params = $this->controllerInterface->params();

        $this->controller = new $controller;
        $this->controller->$method($params);
    }

    public function view()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            if (!isset($this->controller->data)) {
                throw new Exception("A propriedade data é obrigatória");
            }

            if (!array_key_exists("title", $this->controller->data)) {
                throw new Exception("A propriedade title é obrigatória em data");
            }

            extract($this->controller->data);
            require "../app/views/index.php";
        }
    }
}
