<?php
require "./src/Models/UserEntity.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('home.view');
    }
    public function edit($a = 1, $b = 2)
    {
        $c = $a + $b;
        echo "Ket qua =  $c";
    }
}
