<?php
require "./src/Models/UserEntity.php";

class UserModel extends Database
{
    public function getUserById($id)
    {
        $rs = $this->table('user')
            ->getOne("username", "$id");
        if ($rs == null) {
            return null;
        }
        $user = new UserEntity($rs->id, $rs->username, $rs->password, $rs->name);
        return $user;
    }
    public function getUserByUsername($username)
    {
        $rs = $this->table('user')
            ->getOne("username", "$username");
        if ($rs == null) {
            return null;
        }
        $user = new UserEntity($rs->id, $rs->username, $rs->password, $rs->name);
        return $user;
    }
    public function login()
    {
    }
    public function signup()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];


        $user = new UserEntity();
        $user = $this->getUserByUsername($username);
        if ($user != null) {
            echo "Username da ton tai!";
        } else {
            $this->table("user")
                ->insert([
                    "username" => $username,
                    "password" => $password
                ]);
            echo "Dang ky thanh cong!";
        }
    }
}
