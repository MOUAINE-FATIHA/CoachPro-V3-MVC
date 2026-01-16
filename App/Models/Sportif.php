<?php
namespace App\Models;

use PDO;
use App\Models\Database;

class Sportif
{
    public static function findByUserId($user_id)
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            SELECT s.*, u.nom, u.prenom, u.email
            FROM sportifs s
            JOIN users u ON u.id = s.user_id
            WHERE s.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
