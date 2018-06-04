<?php
$sql = "INSERT INTO notes (title, content) VALUES (:title, :content)";
$pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
$stmt = $pdo->prepare($sql);
$stmt->execute($_POST);

header("Location: /"); exit;