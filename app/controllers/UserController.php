<?php
namespace Controller;

use Model\UserModel;

class UserController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: " . APP_PATH . "index.php");
            } else {
                echo "Invalid username or password!";
            }
        }
        require_once '../view/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            if ($userModel->createUser($username, $password)) {
                header("Location: " . APP_PATH . "index.php");
            } else {
                echo "Registration failed!";
            }
        }
        require_once '../view/register.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . APP_PATH . "index.php");
    }
}
