<?php

namespace App\Models;

use PDO;

class Reservation
{
    // reserv
    public static function create($seance_id, $sportif_id){
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
            INSERT INTO reservations (seance_id, sportif_id)
            VALUES (:seance_id, :sportif_id)
        ");

        return $stmt->execute([
            'seance_id' => $seance_id,
            'sportif_id' => $sportif_id
        ]);
    }

    //date reserv
    public static function getBySportif($sportif_id){
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
            SELECT r.id,r.date_reserv,r.statut,s.date_seance,s.heure,s.duree FROM reservations r
            JOIN seances s ON r.seance_id = s.id
            WHERE r.sportif_id = :id
            ORDER BY r.date_reserv DESC
        ");

        $stmt->execute(['id' => $sportif_id]);
        return $stmt->fetchAll();
    }

    // reserv coash
    public static function getByCoach($coach_id){
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
        SELECT r.id, r.statut, r.date_reserv, s.date_seance, s.heure, s.duree, u.nom   AS sportif_nom, u.prenom AS sportif_prenom FROM reservations r
        JOIN seances s ON r.seance_id = s.id
        JOIN sportifs sp ON r.sportif_id = sp.id
        JOIN users u ON sp.user_id = u.id
        WHERE s.coach_id = :coach_id
        ORDER BY r.date_reserv DESC
    ");

        $stmt->execute(['coach_id' => $coach_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateStatus($reservation_id, $statut){
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare("
        UPDATE reservations
        SET statut = :statut
        WHERE id = :id
    ");

        return $stmt->execute([
            'statut' => $statut,
            'id' => $reservation_id
        ]);
    }
}
