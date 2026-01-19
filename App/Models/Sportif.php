<?php
namespace App\Models;

use PDO;
use App\Models\Database;

class Sportif
{
    public static function create($user_id)
    {
        $pdo = Database::getInstance(); 
        $stmt = $pdo->prepare("INSERT INTO sportifs (user_id) VALUES (:user_id)");
        $success = $stmt->execute(['user_id' => $user_id]);

        if(!$success) {
            die("Erreur: impossible d'insérer sportif"); 
        }

        return $success;
    }

    public static function findByUserId($user_id)
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM sportifs WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$result) {
            die("Erreur: profil sportif introuvable pour user_id = $user_id"); 
        }

        return $result;
    }
}
