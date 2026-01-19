<?php

namespace App\Controllers;

use Core\Session;
use App\Models\Coach;
use App\Models\Seance;
use App\Models\Reservation;
use App\Models\Sportif;

class SportifController
{
    public function dashboard()
    {
        Session::requireRole('sportif');
        $coachs = Coach::getAll(); 
        $seances = Seance::getAllAvailable(); 
        include __DIR__ . '/../Views/sportif/dashboard.php';
    }
    public function coaches()
    {
        Session::requireRole('sportif');
        $coaches = Coach::getAll();
        include __DIR__ . '/../Views/sportif/coaches.php';
    }
    public function seances()
    {
        Session::requireRole('sportif');
        $seances = Seance::getAvailable();
        include __DIR__ . '/../Views/sportif/seances.php';
    }
    public function reserver()
    {
        Session::requireRole('sportif');

        $seance_id = $_GET['id'] ?? null;
        if (!$seance_id) {
            header('Location: /sport-mvc/public/sportif/seances');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $sportif = Sportif::findByUserId($user_id);
        if (!$sportif) {
            die("Erreur: profil sportif introuvable. Veuillez vous réinscrire ou contacter admin.");
        }
        Reservation::create($seance_id, $sportif['id']);

        header('Location: /sport-mvc/public/sportif/history');
        exit;
    }
    public function history()
    {
        Session::requireRole('sportif');

        $user_id = $_SESSION['user_id'];
        $sportif = Sportif::findByUserId($user_id);

        $reservations = Reservation::getBySportif($sportif['id']);
        include __DIR__ . '/../Views/sportif/history.php';
    }
}
