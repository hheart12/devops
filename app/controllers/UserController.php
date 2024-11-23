<?php
namespace Controller;

use Model\UserModel;

class UserController {
    private $userModel;

    public function __construct() {
        error_reporting(E_ALL & ~E_NOTICE);
        session_start(); // Memastikan session dimulai di sini
        $this->userModel = new UserModel();
    }

    public function login($email, $password) {
        $user = $this->userModel->login($email, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: /unkpresent/devops/app/view/barang_list.php");
            exit();
        } else {
            $_SESSION['error'] = $this->userModel->emailExists($email) ? 
                "Invalid/unmatched role, email or password." : "Email not registered!";
            header("Location: /unkpresent/devops/app/view/login.php");
            exit();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /unkpresent/devops/app/view/login.php");
        exit();
    }

public function register($nama, $email, $password) {
    // Start session if not started yet
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Check if email already exists
    if ($this->userModel->emailExists($email)) {
        $_SESSION['error'] = "Email already registered!";
        // Redirect back to register page
        header("Location: /unkpresent/devops/app/view/register.php");
        exit();
    }

    // Try to register the user
    if ($this->userModel->register($nama, $email, $password)) {
        // Set success message in session
        $_SESSION['success'] = "Registration successful! Please log in.";
        header("Location: /unkpresent/devops/app/view/login.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to register!";
        header("Location: /unkpresent/devops/app/view/register.php");
        exit();
    }
}

}

$controller = new UserController();
