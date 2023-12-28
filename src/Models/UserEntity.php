<?php

class UserEntity
{
    private $id = '';
    private $username = '';
    private $password = '';
    private $create_date = '';
    private $image = '';
    private $name = '';
    private $date_of_birth = '';
    private $gender = '';
    private $address = '';
    private $phone_number = '';


    public function __construct($id = '', $username = '', $password = '', $create_date = '', $image = '', $name = '', $date_of_birth = '', $gender = '', $address = '', $phone_number = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->create_date = $create_date;
        $this->image = $image;
        $this->name = $name;
        $this->date_of_birth = $date_of_birth;
        $this->gender = $gender;
        $this->address = $address;
        $this->phone_number = $phone_number;
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

    /**
     * Get the value of create_date
     */
    public function getCreate_date()
    {
        return $this->create_date;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of date_of_birth
     */
    public function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the value of phone_number
     */
    public function getPhone_number()
    {
        return $this->phone_number;
    }
}
