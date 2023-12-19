<?php
class App {

    protected $controller = "Home";
    protected $action = "Show";
    protected $params = [];

    public function __construct() {
        require_once "Layouts/header.php";
        $arr = $this->UrlProcess();

        // Controller
        if ($arr !== null && file_exists("./src/Controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        else if ($arr !== null && !file_exists("./src/Controllers/" . $arr[0] . ".php")){
            $this->controller = "NotFound404";
            unset($arr[0]);
        }

        require_once "./src/Controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        // Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }

        // Params
        $this->params = $arr ? array_values($arr) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
        require_once "Layouts/footer.php";
    }

    protected function UrlProcess() {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
        return null;
    }
}
?>