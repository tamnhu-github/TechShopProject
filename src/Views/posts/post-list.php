<?php ob_start(); ?>
<div class="container mt-4">
    <h1 class="mb-4">Post List</h1>
    <ul class="list-group">
        <?php foreach ($posts as $post): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <a href="post/show/<?= $post['id'] ?>" class="text-primary text-decoration-none">
                        <?= $post['title'] ?>
                    </a>
                </span>
                <span>
                    <a href="post/update/<?= $post['id'] ?>" class="btn btn-sm btn-warning text-decoration-none">Edit</a>
                    <a href="post/delete/<?= $post['id'] ?>" class="btn btn-sm btn-danger text-decoration-none">Delete</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="post/create" class="btn btn-success mt-3 text-decoration-none">Add Post</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>
