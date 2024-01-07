<?php
require "./src/Models/UserEntity.php";

class UserModel
{
    use Database;
    public function getUserById($id)
    {
        $rs = $this->table('user')
            ->getOne("username", "$id");
        if ($rs == null) {
            return null;
        }
        $user = new UserEntity($rs->id, $rs->username, $rs->password, $rs->created_at, $rs->image, $rs->name, $rs->date_of_birth, $rs->gender, $rs->address, $rs->phone_number);
        return $user;
    }
    public function getUserByUsername($username)
    {
        $rs = $this->table('user')
            ->getOne("username", "$username");
        if ($rs == null) {
            return null;
        }
        $user = new UserEntity($rs->id, $rs->username, $rs->password, $rs->created_at, $rs->image, $rs->name, $rs->date_of_birth, $rs->gender, $rs->address, $rs->phone_number);
        return $user;
    }
    public function login()
    {
    }
    public function signup()
    {
    }
}
