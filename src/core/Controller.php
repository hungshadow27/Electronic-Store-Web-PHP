<?php
class Controller
{
    public function view($name)
    {
        $filename = "./src/Views/" . $name . ".php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "./src/Views/404.php";
            require $filename;
        }
    }
}
