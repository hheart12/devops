<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->checkLogin($email, $password);

            if ($user) {
                // Set session atau token login
                $_SESSION['user'] = $user;
                header("Location: " . APP_PATH . "pengeluaran");
                exit();
            } else {
                echo "Login Failed!";
            }
        }

        include_once 'app/views/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $userModel->registerUser($nama, $email, $password);

            header("Location: " . APP_PATH . "login");
            exit();
        }

        include_once 'app/views/register.php';
    }

    public function logout() {
        session_destroy();
        header("Location: " . APP_PATH . "login");
        exit();
    }
}
?>
