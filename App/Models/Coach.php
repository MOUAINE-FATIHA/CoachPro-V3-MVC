<?php
namespace App\Models;

use PDO;
use App\Models\Database;

class Coach
{
    // Créer un coach
    public static function create($user_id, $discipline, $annees_exp, $description)
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            INSERT INTO coaches (user_id, discipline, annees_exp, description)
            VALUES (:user_id, :discipline, :annees_exp, :description)
        ");

        return $stmt->execute([
            'user_id' => $user_id,
            'discipline' => $discipline,
            'annees_exp' => $annees_exp,
            'description' => $description
        ]);
    }

    // Trouver coach par user_id
    public static function findByUserId($user_id)
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            SELECT c.*, u.nom, u.prenom, u.email
            FROM coaches c
            JOIN users u ON u.id = c.user_id
            WHERE c.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // modification profil coach
    public static function updateProfile($user_id, $discipline, $annees_exp, $description)
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            UPDATE coaches
            SET discipline = ?, annees_exp = ?, description = ?
            WHERE user_id = ?
        ");
        return $stmt->execute([$discipline, $annees_exp, $description, $user_id]);
    }
}
