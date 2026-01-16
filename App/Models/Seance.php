<?php
namespace App\Models;

use PDO;
use App\Models\Database;

class Seance
{
    public static function create($coach_id, $titre, $date, $heure, $duree)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            INSERT INTO seances (id_coach, titre, date, heure, duree)
            VALUES (:id_coach, :titre, :date, :heure, :duree)
        ");
        return $stmt->execute([
            'id_coach' => $coach_id,
            'titre' => $titre,
            'date' => $date,
            'heure' => $heure,
            'duree' => $duree
        ]);
    }

    public static function getAllByCoach($coach_id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM seances WHERE id_coach = :id_coach ORDER BY date, heure");
        $stmt->execute(['id_coach' => $coach_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
