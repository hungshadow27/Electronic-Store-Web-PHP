<?php
require "./src/Models/UserModel.php";

class LoginController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('login');
    }
    public function signin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usermodel = new UserModel;
            $usermodel->login();
        }
    }
    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usermodel = new UserModel;
            $usermodel->signup();
        }
    }
}
