<?php

namespace App\Core;

class Model
{
    protected $db;

    private $tableName;
    private $where = null;

    public function __construct()
    {
        if ($this->db == null) {
            $this->db = new \PDO('sqlite:' . PATH_TO_SQLITE_FILE);
        }

        return $this->db;
    }

    public function tableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function where($conditions)
    {
        $where = [];

        foreach ($conditions as $key => $value) {
            $where[] = "(:$key=$value)";
        }

        $this->where = implode('&', $where);
    }

    public function select()
    {
        $sql = "SELECT * FROM " . $this->tableName;

        if (isset($where)) {
            $sql .= "WHERE " . $this->where;
        }

        $this->db->query($sql);
    }
}