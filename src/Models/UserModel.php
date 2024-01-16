<?php
require_once "./src/Models/UserEntity.php";

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
    public function getUserById1($id)
    {
        $rs = $this->table('user')
            ->getOne("id", "$id");
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
    public function createNewUser($username, $password, $created_at)
    {
        $rs = $this->table("user")
            ->insert([
                "username" => $username,
                "password" => $password,
                "created_at" => $created_at
            ]);
    }
    public function updateUserInfo($id, $name, $phoneNumber, $dateOfBirth, $gender, $address)
    {
        $rs = $this->table("user")
            ->update('id', $id, [
                'name' => $name, 'phone_number' => $phoneNumber,
                'date_of_birth' => $dateOfBirth, 'gender' => $gender, 'address' => $address
            ]);
        return $rs;
    }
    public function updateUserImage($id, $image)
    {
        $rs = $this->table("user")
            ->update('id', $id, ['image' => $image]);
        return $rs;
    }
}
