<?php
require "./src/Models/UserEntity.php";
class LogoutController
{
    use Controller;
    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
            unset($_SESSION['CARTITEMS']);
            redirect('home');
            exit;
        }
    }
}
