<?php
require "./src/Models/UserEntity.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('home.view');
    }
}
