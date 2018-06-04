<?php
$pdo = new PDO("mysql:host=localhost; dbname=marlin", "root", "");
$sql = "SELECT * FROM notes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$note = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Task</h1>
            <form action="update.php?id=<?= $note['id']; ?>" method="post">
                <div class="form-group">
                    <input name="title" type="text" class="form-control" value="<?= $note['title']; ?>">
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control"><?= $note['content']; ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>