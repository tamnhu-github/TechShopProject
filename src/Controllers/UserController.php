<?php
namespace App\Controllers;

use App\Models\User;
use App\Controller;

class UserController extends Controller
{
    private $userModel;

    public function __construct() 
    {
        $this->userModel = new User();
    }

    public function index() 
    {
        $users = $this->userModel->getAllUsers();
        $this->render('users/user-list', ['users' => $users]);
    }

    public function show($userId) 
    {
        $user = $this->userModel->getUserById($userId);
        $this->render('users/user-form', ['user' => $user]);
    }
    

    public function create() 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password_input = $_POST['password_input'];
            $password_check = $_POST['password_check'];
            $email = $_POST['email'];
 
            $this->userModel->createUser($username, $firstname, $lastname, $password_input, $password_check, $email);
        }

        $this->render('users/user-form', ['user' => []]);
    }

    public function update($userId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password_input = $_POST['password_input'];
            $password_check = $_POST['password_check'];
            $email = $_POST['email'];

            $this->userModel->updateUser($userId, $username, $firstname, $lastname, $password_input, $password_check, $email);
        }

        $user = $this->userModel->getUserById($userId);
        
        $this->render('users/user-form', ['user' => $user]);
    }

    public function delete($userId)
    {
        $this->userModel->deleteUser($userId);

        header('Location: /index.php');
    }
}
?>