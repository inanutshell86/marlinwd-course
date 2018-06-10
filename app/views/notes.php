<?php $this->layout('layout'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Notes</h1>
            <a href="/create" class="btn btn-success">Add Note</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($notes as $note):?>
                    <tr>
                        <td><?= $note['id']; ?></td>
                        <td><?= $note['title']; ?></td>
                        <td>
                            <a href="/notes/<?= $note['id']; ?>" class="btn btn-info">
                                Show
                            </a>
                            <a href="/note/<?= $note['id']; ?>" class="btn btn-warning">
                                Edit
                            </a>
                            <a onclick="return confirm('are you sure?');" href="/delete/note/<?= $note['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>
