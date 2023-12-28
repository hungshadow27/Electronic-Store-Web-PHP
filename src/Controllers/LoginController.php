<?php
require "./src/Models/UserModel.php";

class LoginController
{
    use Controller;
    public function __construct()
    {
        if (isset($_SESSION['USER'])) {
            redirect('home');
            die;
        }
    }
    public function index($a = '', $b = '', $c = '')
    {
        $this->view('login.view');
    }
    public function signin()
    {
        $data[] = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $usermodel = new UserModel;
            $user = $usermodel->getUserByUsername($username);
            if ($user != null) {
                if ($user->getUsername() == $username && $user->getPassword() == $password) {
                    $_SESSION['USER'] = serialize($user);;
                    redirect('home');
                }
            }
            $data['errors'] = "Thong tin tai khoan hoac mat khau khong chinh xac!";
        }
        $this->view('login.view', $data);
    }
    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usermodel = new UserModel;
            $usermodel->signup();
        }
    }
}
