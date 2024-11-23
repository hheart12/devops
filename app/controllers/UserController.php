<?php
require_once('../app/models/User.php');
require_once('../app/core/Controller.php');

class UserController extends Controller {
    public function login() {
        // Memeriksa apakah sudah login
        if (isset($_SESSION['user_id'])) {
            header('Location: /devops/?controller=pengeluaran&action=index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $userData = $user->getByEmail($email);

            if ($userData && password_verify($password, $userData['password'])) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['success'] = "Login berhasil!";
                header('Location: /devops/?controller=pengeluaran&action=index');
            } else {
                $_SESSION['error'] = "Email atau password salah!";
                header('Location: /devops/?controller=user&action=login');
            }
            exit();
        }

        $this->view('login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user = new User();
            if ($user->register($nama, $email, $password)) {
                $_SESSION['success'] = "Registrasi berhasil!";
                header('Location: /devops/?controller=user&action=login');
            } else {
                $_SESSION['error'] = "Gagal registrasi!";
            }
        }

        $this->view('register');
    }
}
