<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = $_POST['identifier'] ?? '';
            $password = $_POST['password'] ?? '';
            $userModel = new User($this->app);
            $user = $userModel->findByEmailOrUsername($identifier);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /?route=dashboard/index');
                exit;
            }
            $error = 'Invalid credentials';
            $this->view('auth/login', compact('error'));
            return;
        }
        $this->view('auth/login');
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'username' => $_POST['username'] ?? '',
                'password' => $_POST['password'] ?? '',
            ];
            $userModel = new User($this->app);
            if ($userModel->create($data)) {
                header('Location: /?route=auth/login');
                exit;
            }
            $error = 'Registration failed';
            $this->view('auth/register', compact('error'));
            return;
        }
        $this->view('auth/register');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /?route=auth/login');
    }
}
