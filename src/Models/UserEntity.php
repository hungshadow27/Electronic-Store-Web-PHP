<?php
class UserEntity
{
    private $id = '';
    private $username = '';
    private $password = '';
    private $name = '';

    public function __construct($id = '', $username = '', $password = '', $name = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getName()
    {
        return $this->name;
    }
}
