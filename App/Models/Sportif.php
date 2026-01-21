<?php
namespace App\Models;
use PDO;
class Sportif{
    public static function create($user_id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO sportifs (user_id) VALUES (:user_id)");
        return $stmt->execute(['user_id' => $user_id]);
    }



    public static function findByUserId($user_id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM sportifs WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch();
    }
}
