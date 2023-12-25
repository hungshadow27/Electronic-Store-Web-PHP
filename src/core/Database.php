<?php

class Database
{
    protected $conn = null;
    protected $table = '';
    protected $statement = '';

    protected $limit = 15;
    protected $offset = 0;

    protected $host = '';
    protected $user = '';
    protected $pass = '';
    protected $name = '';

    public function __construct()
    {
        $this->host = DBHOST;
        $this->user = DBUSER;
        $this->pass = DBPASS;
        $this->name = DBNAME;
        //
        $this->connect();
    }
    protected function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->conn->connect_errno) {
            exit($this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }
    public function table($tableName)
    {
        $this->table = $tableName;
        return $this;
    }
    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
    public function offset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
    public function resetQuery()
    {
        $this->table = '';
        $this->limit = 15;
        $this->offset = 0;
    }
    public function get()
    {
        $sql = "SELECT * FROM $this->table LIMIT ? OFFSET ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('ii', $this->limit, $this->offset);
        $this->statement->execute();
        $this->resetQuery();

        $result = $this->statement->get_result();
        $returnData = [];
        while ($row = $result->fetch_object()) {
            $returnData[] = $row;
        }
        return $returnData;
    }
    public function insert($data = [])
    {
        $fields = implode(',', array_keys($data));
        $valueStr = implode(',', array_fill(0, count($data), '?'));
        $values = array_values($data);
        $sql = "INSERT INTO $this->table($fields) VALUES($valueStr)";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param(str_repeat('s', count($data)), ...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }
    public function updateRow($id, $data = [])
    {
        $keyValues = [];
        foreach ($data as $key => $values) {
            $keyValues[] = $key . '=?';
        }
        $setFields = implode(',', $keyValues);

        $values = array_values($data);
        $sql = "UPDATE $this->table SET $setFields WHERE id = $id";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param(str_repeat('s', count($data)), ...$values);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }
    public function deleteId($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->statement = $this->conn->prepare($sql);
        $this->statement->bind_param('i', $id);
        $this->statement->execute();
        $this->resetQuery();

        return $this->statement->affected_rows;
    }
}
