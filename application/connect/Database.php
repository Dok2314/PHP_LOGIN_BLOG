<?php

namespace application\connect;

use PDO;

class Database
{
    protected $connect;
    protected $host = 'localhost';
    protected $dbname = 'practice_blog';
    protected $username = 'root1';
    protected $password = 'root';
    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public function __construct()
    {
        $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dbname",
            $this->username,
            $this->password,
            $this->options);
    }

    public function dbCheckError($query)
    {
        $errInfo = $query->errorInfo();
        if ($errInfo[0] !== PDO::ERR_NONE) {
            echo $errInfo[2];
            exit();
        }
    }

    public function insert($table, $params)
    {
        $i = 0;
        $coll = '';
        $mask = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $coll .= $key;
                $mask .= "'$value'";
            } else {
                $coll .= " ,$key";
                $mask .= " ,'$value'";
            }
            $i++;
        }
        $sql = "INSERT INTO $table($coll)
                VALUES($mask)";
        $query = $this->connect->prepare($sql);
        $query->execute($params);
        $this->dbCheckError($query);

        return $this->connect->lastInsertId();
    }

    public function selectAll($table, $params = [])
    {
        $bindings = [];
        $sql = "SELECT * FROM $table";
        if (!empty($params)) {
            $whereSql = [];
            foreach ($params as $key => $value) {
                $bindings[] = $value;
                $whereSql[] = "`$key` = ?";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereSql);
        }
        $query = $this->connect->prepare($sql);
        $query->execute($bindings);
        $this->dbCheckError($query);

        return $query->fetchAll();
    }

    public function selectOne($table, $params = [])
    {
        $bindings = [];
        $sql = "SELECT * FROM $table";
        if (!empty($params)) {
            $whereSql = [];
            foreach ($params as $key => $value) {
                $bindings[] = $value;
                $whereSql[] = "`$key` = ?";
            }
            $sql .= ' WHERE ' . implode(' AND ', $whereSql);
        }
        $query = $this->connect->prepare($sql);
        $query->execute($bindings);
        $this->dbCheckError($query);

        return $query->fetch();
    }

    public function update($table, $id, $params)
    {
        $i = 0;
        $str = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $str = $str . $key . " = '" . $value . "'";
            } else {
                $str = $str . ", " . $key . " = '" . $value . "'";
            }
            $i++;
        }

        $sql = "UPDATE $table
            SET $str
            WHERE id = $id";

        $query = $this->connect->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table
            WHERE id = $id";

        $query = $this->connect->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
    }

    public function totalPages($table, $recordsPerPage)
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $query = $this->connect->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
        $total_results = $query->fetchColumn();
        $total_pages = ceil($total_results / $recordsPerPage);

        return $total_pages;
    }

    public function paginate($table, $recordsPerPage)
    {
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $recordsPerPage;

        $sql = "SELECT * FROM $table
                ORDER BY id DESC
                LIMIT $recordsPerPage
                OFFSET $offset";
        $query = $this->connect->prepare($sql);
        $query->execute();
        $this->dbCheckError($query);
        $articles = $query->fetchAll();

        return $articles;
    }
}