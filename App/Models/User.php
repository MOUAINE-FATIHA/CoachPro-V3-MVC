<?php

namespace App\Models;

use PDO;

class User
{
    public static function findByEmail($email){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public static function create($nom, $prenom, $email, $password, $role){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("
            INSERT INTO users (nom, prenom, email, password, role)
            VALUES (:nom, :prenom, :email, :password, :role)
        ");

        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        return $pdo->lastInsertId();
    }
}
