<?php

namespace App;

class QueryBuilder
{
    public $pdo;

    function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost; dbname=marlin", "root", "");
    }

    function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    function getById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    function store($table, $data)
    {
        $keys = array_keys($data);
        $strKeys = implode(",", $keys);
        $placeholders = ":" . implode(", :", $keys);
        $sql = "INSERT INTO $table ($strKeys) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    function update($table, $data)
    {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $placeholders = rtrim($fields, ",");
        $sql = "UPDATE $table SET $placeholders WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    function deleteById($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}