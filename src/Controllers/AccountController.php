<?php
require "./src/Models/UserEntity.php";
class AccountController extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        $data = null;
        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
            $this->view('account.view', $data);
        } else {
            redirect('login');
        }
    }
    public function orders($a = '', $b = '', $c = '')
    {
        $data = null;
        if (isset($_SESSION['USER'])) {
            $user = new UserEntity();
            $user = unserialize($_SESSION['USER']);
            $data['user'] = $user;
            $this->view('orders.view', $data);
        } else {
            redirect('login');
        }
    }
}
