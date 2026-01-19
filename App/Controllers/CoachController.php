<?php

namespace App\Controllers;

use Core\Session;
use App\Models\Coach;
use App\Models\Seance;
use App\Models\Reservation;

class CoachController
{
    public function dashboard()
    {
        Session::requireRole('coach');

        $coach = Coach::findByUserId($_SESSION['user_id']);
        $seances = Seance::getAllByCoach($coach['id']);
        $reservations = Reservation::getByCoach($coach['id']);

        include __DIR__ . '/../Views/coach/dashboard.php';
    }


    public function profile()
    {
        Session::requireRole('coach');
        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        include __DIR__ . '/../Views/coach/profile.php';
    }

    public function updateProfile()
    {
        Session::requireRole('coach');

        $user_id = $_SESSION['user_id'];
        $discipline = $_POST['discipline'] ?? '';
        $annees_exp = $_POST['annees_exp'] ?? '';
        $description = $_POST['description'] ?? '';

        if (empty($discipline) || empty($annees_exp)) {
            $error = "Tous les champs sont obligatoires";
        } else {
            Coach::updateProfile($user_id, $discipline, $annees_exp, $description);
            $success = "Profil mis à jour";
        }

        $coach = Coach::findByUserId($user_id);
        include __DIR__ . '/../Views/coach/profile.php';
    }

    public function seances()
    {
        Session::requireRole('coach');

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        $seances = Seance::getAllByCoach($coach_id);
        include __DIR__ . '/../Views/coach/seances.php';
    }

    public function createSeance()
    {
        Session::requireRole('coach');

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date_seance = $_POST['date_seance'] ?? '';
            $heure = $_POST['heure'] ?? '';
            $duree = $_POST['duree'] ?? '';

            if (empty($date_seance) || empty($heure) || empty($duree)) {
                $error = "Tous les champs sont obligatoires";
            } else {
                Seance::create($coach_id, $date_seance, $heure, $duree);
                header('Location: /sport-mvc/public/coach/seances');
                exit;
            }
        }

        include __DIR__ . '/../Views/coach/create_seance.php';
    }
    public function editSeance()
    {
        Session::requireRole('coach');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /sport-mvc/public/coach/seances');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        $seance = Seance::findById($id, $coach_id);
        if (!$seance) {
            die("Séance introuvable");
        }

        include __DIR__ . '/../Views/coach/edit_seance.php';
    }
    public function updateSeance()
    {
        Session::requireRole('coach');

        $id = $_POST['id'] ?? null;
        $date_seance = $_POST['date_seance'] ?? '';
        $heure = $_POST['heure'] ?? '';
        $duree = $_POST['duree'] ?? '';

        if (!$id || empty($date_seance) || empty($heure) || empty($duree)) {
            die("Données invalides");
        }

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        Seance::update($id, $coach_id, $date_seance, $heure, $duree);

        header('Location: /sport-mvc/public/coach/seances');
        exit;
    }

    public function deleteSeance()
    {
        Session::requireRole('coach');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /sport-mvc/public/coach/seances');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        Seance::delete($id, $coach_id);

        header('Location: /sport-mvc/public/coach/seances');
        exit;
    }
    public function reservations()
    {
        Session::requireRole('coach');

        $user_id = $_SESSION['user_id'];
        $coach = Coach::findByUserId($user_id);
        $coach_id = $coach['id'];

        $reservations = Reservation::getByCoach($coach_id);

        include __DIR__ . '/../Views/coach/reservations.php';
    }
}
