<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder();

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->updateNote($data);

header("Location: /"); exit;