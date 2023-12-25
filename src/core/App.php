<?php
class App
{
    private $controller = 'Home';
    private $method = 'index';
    private function splitURL()
    {
        $URL =  $_GET['url'] ?? 'home';
        $URL = explode('/', $URL);
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();
        $filename = "./src/Controllers/" . ucfirst($URL[0]) . "Controller.php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]) . "Controller";
        } else {
            $filename = "./src/Controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}
