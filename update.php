<?php

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
$sql = "UPDATE notes SET title = :title, content = :content WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute($data);

header("Location: /"); exit;