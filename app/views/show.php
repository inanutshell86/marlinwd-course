<?php $this->layout('layout'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?= $note['title'];?></h1>
            <p><?= $note['content'];?></p>
            <a href="/notes">Go Back</a>
        </div>
    </div>
</div>