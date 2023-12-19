<?php
require("./src/Models/Database.php");
class UserModel extends Database
{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function signin($username, $password)
	{
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = $this->db->conn->query($sql);
		$this->db->closeDatabase();
		return $result;
	}
	public function signup($username, $password)
	{
		$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
		$this->db->conn->query($sql);
		$this->db->closeDatabase();
	}

	public function checkExists($username)
	{
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $this->db->conn->query($sql);
		return $result;
	}
}
