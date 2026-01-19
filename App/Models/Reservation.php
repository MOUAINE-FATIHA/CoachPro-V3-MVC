<?php

namespace App\Models;

use PDO;
use App\Models\Database;

class Reservation
{
    public static function getByCoach($coach_id)
    {
        $db = Database::getInstance();


        $stmt = $db->prepare("
            SELECT 
            r.id AS reservation_id,r.date_reserv,r.statut AS reservation_statut,s.date_seance,s.heure,s.duree,u.nom,u.prenomFROM reservations r
            JOIN seances s ON r.seance_id = s.id
            JOIN sportifs sp ON r.sportif_id = sp.id
            JOIN users u ON sp.user_id = u.id
            WHERE s.coach_id = :coach_id
            ORDER BY r.date_reserv DESC
        ");

        $stmt->execute(['coach_id' => $coach_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($seance_id, $sportif_id)
    {
        $db = Database::getInstance();


        $stmt = $db->prepare("
        INSERT INTO reservations (seance_id, sportif_id)
        VALUES (:seance_id, :sportif_id)
    ");
        $stmt->execute([
            'seance_id' => $seance_id,
            'sportif_id' => $sportif_id
        ]);
        $db->prepare("
        UPDATE seances SET statut = 'reservee'
        WHERE id = :id
    ")->execute(['id' => $seance_id]);
    }

    public static function getBySportif($sportif_id)
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
        SELECT s.date_seance, s.heure, s.duree,r.date_reserv, r.statut FROM reservations r
        JOIN seances s ON r.seance_id = s.id
        WHERE r.sportif_id = :id
        ORDER BY r.date_reserv DESC
    ");
        $stmt->execute(['id' => $sportif_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
