<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Coach;
use App\Models\Sportif;

class AuthController{
    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            $user = User::findByEmail($email);
            if (!$user || !password_verify($password, $user['password'])) {
                $error = "Email ou mot de passe incorrect";
                include __DIR__ . '/../Views/auth/login.php';
                return;
            }

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'coach') {
                header('Location: /sport-mvc/public/coach/dashboard');
            } else {
                header('Location: /sport-mvc/public/sportif/dashboard');
            }
            exit;
        }

        include __DIR__ . '/../Views/auth/login.php';
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_id = User::create(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                $_POST['role']
            );

            if ($_POST['role'] === 'coach') {
                Coach::create(
                    $user_id,
                    $_POST['discipline'],
                    $_POST['annees_exp'],
                    $_POST['description']
                );
            } else {
                Sportif::create($user_id);
            }

            $success = "Inscription réussie. Connectez-vous.";
            include __DIR__ . '/../Views/auth/login.php';
            return;
        }
        include __DIR__ . '/../Views/auth/register.php';
    }
    public function logout(){
        session_start();
        session_destroy();
        header('Location: /sport-mvc/public/login');
    }
}
