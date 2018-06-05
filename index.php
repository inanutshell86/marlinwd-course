<?php
require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$notes = $db->getAll("notes");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notepad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Notes</h1>
            <a href="create.php" class="btn btn-success">Add Note</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php foreach ($notes as $note):?>
                <tbody>
                    <td><?= $note['id']; ?></td>
                    <td><?= $note['title']; ?></td>
                    <td>
                        <a href="show.php?id=<?= $note['id']; ?>" class="btn btn-info">Show</a>
                        <a href="edit.php?id=<?= $note['id']; ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Are you sure?');" href="delete.php?id=<?= $note['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>