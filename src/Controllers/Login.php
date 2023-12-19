<?php

class Login
{
    public function __construct()
    {
    }

    function Show()
    {
        require_once "./src/Views/Login.php";
    }
    public function SignIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Retrieve form data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // In a real-world scenario, you would validate the inputs and use a database
            // for storing and verifying user credentials. This is a basic example.

            // For demonstration purposes, let's check if the username and password match a predefined value.

            require("./src/Models/UserModel.php");
            $userModel = new UserModel();
            $result = $userModel->signin($username, $password);

            if ($result->num_rows == 1) {
                // Successful login
                echo "Login successful. Welcome, $username!";
            } else {
                // Invalid credentials
                echo "Invalid username or password. Please try again.";
            }
        }
    }
    public function SignUp()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Retrieve form data
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];

            // In a real-world scenario, you would validate the inputs and use a database
            // for storing and verifying user credentials. This is a basic example.

            // For demonstration purposes, let's check if the username and password match a predefined value.

            require("./src/Models/UserModel.php");
            $userModel = new UserModel();
            $checkUserExist = $userModel->checkExists($username);

            if ($checkUserExist->num_rows > 0) {
                echo "Tên tài khoản đã được sử dụng";
            } else {
                // Insert new user into the database
                $userModel->signup($username, $password);
                echo "Registration successful. Welcome, $username!";
            }
        }
    }
}
