<?php

class UserEntity
{
    private $id = '';
    private $username = '';
    private $password = '';
    private $created_at = '';
    private $image = '';
    private $name = '';
    private $date_of_birth = '';
    private $gender = '';
    private $address = '';
    private $phone_number = '';
    private $role = '';


    public function __construct($id = '', $username = '', $password = '', $created_at = '', $image = '', $name = '', $date_of_birth = '', $gender = '', $address = '', $phone_number = '', $role = '')
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->image = $image;
        $this->name = $name;
        $this->date_of_birth = $date_of_birth;
        $this->gender = $gender;
        $this->address = $address;
        $this->phone_number = $phone_number;
        $this->role = $role;
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
    public function getRole()
    {
        return $this->role;
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
        return $this->created_at;
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

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Set the value of date_of_birth
     *
     * @return  self
     */
    public function setDate_of_birth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Set the value of phone_number
     *
     * @return  self
     */
    public function setPhone_number($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }
    public function setUserInfo($name, $phoneNumber, $dateOfBirth, $gender, $address)
    {
        $this->name = $name;
        $this->phone_number = $phoneNumber;
        $this->date_of_birth = $dateOfBirth;
        $this->gender = $gender;
        $this->address = $address;
    }
}
