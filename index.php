<?php
require 'vendor/autoload.php';

use Delight\Auth\Auth;
use App\QueryBuilder;

//testing delight-im/auth component
/*$db = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
$auth = new Auth($db);

$email = "jonhdow@yahoo.com";
$password = "123456";


try {
    $userId = $auth->register($email, $password, null, function ($selector, $token) {
        // send `$selector` and `$token` to the user (e.g. via email)
    });

    // we have signed up a new user with the ID `$userId`
}
catch (\Delight\Auth\InvalidEmailException $e) {
    echo "invalid email address";
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    echo "invalid password";
}
catch (\Delight\Auth\UserAlreadyExistsException $e) {
    echo "user already exists";
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    echo "too many requests";
}
var_dump($auth);die;*/

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