<?php
require "./src/Models/UserEntity.php";
class HomeController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        $data = null;
        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
        }
        $this->view('home.view', $data);
    }
    public function edit($a = 1, $b = 2)
    {
        $c = $a + $b;
        echo "Ket qua =  $c";
    }
}
