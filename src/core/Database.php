<?php

class Database
{
    private function connect()
    {
        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($conn->connect_error) {
            printf($conn->connect_error);
            exit();
        }
        $conn->set_charset("utf8");
        return $conn;
    }
    public function query($query, $data = [])
    {
    }
}
