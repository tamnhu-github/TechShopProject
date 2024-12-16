<?php ob_start(); ?>
<div class="container mt-4">
    <h1 class="mb-4">Post Form</h1>
    <form action="/post/<?= isset($post['id']) ? "update/$post[id]" : 'create' ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                class="form-control" 
                value="<?= isset($post['title']) ? $post['title'] : '' ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea 
                id="content" 
                name="content" 
                class="form-control"
                rows="5"
            ><?= isset($post['content']) ? $post['content'] : '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <?= isset($post['id']) ? 'Update' : 'Create' ?>
        </button>
        <a href="/index.php" class="btn btn-secondary">Back to Post List</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>
