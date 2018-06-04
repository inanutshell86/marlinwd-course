<?php
$pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
$sql = "DELETE FROM notes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();

header("Location: /");