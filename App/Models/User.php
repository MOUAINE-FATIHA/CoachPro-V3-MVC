<?php

namespace App\Models;

use PDO;
use App\Models\Database;

class User
{
    public static function findByEmail($email)
    {
        $pdo = Database::getInstance(); 
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($nom, $prenom, $email, $password, $role)
    {
        $pdo = Database::getInstance(); 

        $stmt = $pdo->prepare("
            INSERT INTO users (nom, prenom, email, password, role)
            VALUES (:nom, :prenom, :email, :password, :role)
        ");

        $success = $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        return $success ? $pdo->lastInsertId() : false;
    }
}
