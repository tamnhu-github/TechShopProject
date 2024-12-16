<?php ob_start(); ?>
<div class="container mt-4">
    <h1 class="mb-4"><?= isset($user['id']) ? 'Edit User' : 'Create User' ?></h1>
    <form action="/user/<?= isset($user['id']) ? "update/$user[id]" : 'create' ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username" class="form-control" 
                   value="<?= isset($user['username']) ? htmlspecialchars($user['username']) : '' ?>" 
                   required>
        </div>
        
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name:</label>
            <input type="text" id="firstname" name="firstname" class="form-control" 
                   value="<?= isset($user['firstname']) ? htmlspecialchars($user['firstname']) : '' ?>">
        </div>
        
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name:</label>
            <input type="text" id="lastname" name="lastname" class="form-control" 
                   value="<?= isset($user['lastname']) ? htmlspecialchars($user['lastname']) : '' ?>">
        </div>
        
        <div class="mb-3">
            <label for="password_input" class="form-label">Password:</label>
            <input type="password" id="password_input" name="password_input" class="form-control" 
                   value="<?= isset($user['password_input']) ? htmlspecialchars($user['password_input']) : '' ?>">
        </div>
        
        <div class="mb-3">
            <label for="password_check" class="form-label">Confirm Password:</label>
            <input type="password" id="password_check" name="password_check" class="form-control" 
                   value="<?= isset($user['password_check']) ? htmlspecialchars($user['password_check']) : '' ?>">
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" 
                   value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>">
        </div>
        
        <button type="submit" class="btn btn-primary"><?= isset($user['id']) ? 'Update' : 'Create' ?></button>
        <a href="/index.php" class="btn btn-secondary">Back to User List</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ .  '/../../../templates/layout.php'); ?>
