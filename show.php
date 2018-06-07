<?php
require 'vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();
$note = $db->getById("notes", $_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $note['title']; ?></h1>
            <p><?= $note['content']; ?></p>
            <a href="/">Go Back</a>
        </div>
    </div>
</div>
</body>
</html>