
<?php ob_start(); ?>

<div class="container mt-4">
    <h1 class="mb-4">User List</h1>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Fisrtname</th>
                        <th>Lastname</th>
                        <th>Password_Input</th>
                        <th>Password_Check</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['firstname']) ?></td>
                            <td><?= htmlspecialchars($user['lastname']) ?></td>
                            <td><?= htmlspecialchars($user['password_input']) ?></td>
                            <td><?= htmlspecialchars($user['password_check']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td class="text-center">
                                <a href="user/show/<?= $user['id'] ?>" 
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="user/update/<?= $user['id'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="user/delete/<?= $user['id'] ?>"
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Are you sure you want to delete this user?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="mt-3">
                <a href="user/create" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Add New User
                </a>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include (__DIR__ . '/../../../templates/layout.php'); ?>
