<?php
namespace App\Models;
use PDO;

class Seance{
    public static function create($coach_id, $date_seance, $heure, $duree){
        $db = Database::getInstance();
        $stmt = $db->prepare("
            INSERT INTO seances (coach_id, date_seance, heure, duree)
            VALUES (:coach_id, :date_seance, :heure, :duree)
        ");

        return $stmt->execute([
            'coach_id'    => $coach_id,
            'date_seance' => $date_seance,
            'heure'       => $heure,
            'duree'       => $duree
        ]);
    }

    public static function getAllByCoach($coach_id){
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT *
            FROM seances
            WHERE coach_id = :coach_id
            ORDER BY date_seance, heure
        ");
        $stmt->execute(['coach_id' => $coach_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findById($id, $coach_id){
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT *
            FROM seances
            WHERE id = :id AND coach_id = :coach_id
        ");
        $stmt->execute([
            'id'       => $id,
            'coach_id' => $coach_id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllAvailable(){
        $pdo = Database::getInstance();

        $stmt = $pdo->query("
            SELECT 
                s.id,
                s.date_seance,
                s.heure,
                s.duree,
                u.nom AS coach_nom,
                u.prenom AS coach_prenom,
                c.discipline
            FROM seances s
            JOIN coaches c ON s.coach_id = c.id
            JOIN users u ON c.user_id = u.id
            WHERE s.statut = 'disponible'
            ORDER BY s.date_seance, s.heure
        ");

        return $stmt->fetchAll();
    }

    public static function getAvailable(){
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT s.id, s.date_seance, s.heure, s.duree,
                   u.nom, u.prenom, c.discipline
            FROM seances s
            JOIN coaches c ON s.coach_id = c.id
            JOIN users u ON c.user_id = u.id
            WHERE s.statut = 'disponible'
            ORDER BY s.date_seance, s.heure
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($id, $coach_id, $date_seance, $heure, $duree){
        $db = Database::getInstance();
        $stmt = $db->prepare("
            UPDATE seances
            SET date_seance = :date_seance,
                heure = :heure,
                duree = :duree
            WHERE id = :id AND coach_id = :coach_id
        ");

        return $stmt->execute([
            'date_seance' => $date_seance,
            'heure'       => $heure,
            'duree'       => $duree,
            'id'          => $id,
            'coach_id'    => $coach_id
        ]);
    }
    public static function delete($id, $coach_id){
        $db = Database::getInstance();
        $stmt = $db->prepare("
            DELETE FROM seances
            WHERE id = :id AND coach_id = :coach_id
        ");
        return $stmt->execute([
            'id'       => $id,
            'coach_id' => $coach_id
        ]);
    }
}
