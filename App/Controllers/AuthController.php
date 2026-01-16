<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Coach;

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $error = "Tous les champs sont obligatoires";
                include __DIR__ . '/../Views/auth/login.php';
                return;
            }

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



    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = trim($_POST['nom']);
            $prenom = trim($_POST['prenom']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $role = $_POST['role'];

            $discipline = $_POST['discipline'] ?? null;
            $annees_exp = $_POST['annees_exp'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role)) {
                $error = "Tous les champs sont obligatoires";
                include __DIR__ . '/../Views/auth/register.php';
                return;
            }

            if ($role === 'coach' && (empty($discipline) || empty($annees_exp))) {
                $error = "Les informations coach sont obligatoires";
                include __DIR__ . '/../Views/auth/register.php';
                return;
            }

            if (User::findByEmail($email)) {
                $error = "Email déjà utilisé";
                include __DIR__ . '/../Views/auth/register.php';
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $user_id = User::create($nom, $prenom, $email, $hashedPassword, $role);

            if ($role === 'coach') {
                Coach::create($user_id, $discipline, $annees_exp, $description);
            }

            $success = "Inscription réussie, connectez-vous";
            include __DIR__ . '/../Views/auth/login.php';
            return;
        }
        include __DIR__ . '/../Views/auth/register.php';
    }
}
