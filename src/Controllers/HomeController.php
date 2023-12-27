<?php
require "./src/Models/UserEntity.php";
class HomeController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {

        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $data['username'] = $user->getUsername();
        }
        $this->view('home.view', $data);
    }
    public function edit($a = 1, $b = 2)
    {
        $c = $a + $b;
        echo "Ket qua =  $c";
    }
}
