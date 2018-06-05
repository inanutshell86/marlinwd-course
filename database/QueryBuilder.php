<?php
class QueryBuilder
{
    function getAllNotes()
    {
        $pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
        $sql = "SELECT * FROM notes";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute();
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $notes;
    }

    function getNote($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
        $sql = "SELECT * FROM notes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_ASSOC);
        return $note;
    }

    function addNote($data)
    {
        $sql = "INSERT INTO notes (title, content) VALUES (:title, :content)";
        $pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }

    function updateNote($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
        $sql = "UPDATE notes SET title = :title, content = :content WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }

    function deleteNote($id)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}