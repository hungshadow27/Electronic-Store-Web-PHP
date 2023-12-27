<?php
require "./src/Models/UserEntity.php";
class LogoutController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
            redirect('home');
        }
    }
}
