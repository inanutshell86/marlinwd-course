<?php
require 'vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->update("notes", $data);

header("Location: /"); exit;