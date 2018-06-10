<?php $this->layout('layout'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Note</h1>
            <form action="/update/note/<?= $note['id'];?>" method="post">

                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="<?= $note['title'];?>">
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control"><?= $note['content'];?></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
