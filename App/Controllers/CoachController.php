<?php
namespace App\Controllers;

use Core\Session;
use App\Models\Coach;
use App\Models\Seance;

class CoachController
{
    public function dashboard()
    {
        Session::requireRole('coach'); 
        include __DIR__ . '/../Views/coach/dashboard.php';
    }

   
    public function profile()
    {
        Session::requireRole('coach');

        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            header('Location: /sport-mvc/public/login');
            exit;
        }

        $coach = Coach::findByUserId($user_id);
        $discipline = $coach['discipline'] ?? '';
        $annees_exp = $coach['annees_exp'] ?? '';
        $description = $coach['description'] ?? '';
        $nom = $coach['nom'] ?? '';
        $prenom = $coach['prenom'] ?? '';
        $email = $coach['email'] ?? '';

        include __DIR__ . '/../Views/coach/profile.php';
    }
    public function updateProfile()
{
    Session::requireRole('coach');
    $user_id = $_SESSION['user_id'];

    $discipline = $_POST['discipline'] ?? '';
    $annees_exp = $_POST['annees_exp'] ?? '';
    $description = $_POST['description'] ?? '';

    $error = '';
    $success = '';

    if (empty($discipline) || empty($annees_exp)) {
        $error = "Discipline et années d'expérience sont obligatoires";
    } else {
        $updated = Coach::updateProfile($user_id, $discipline, $annees_exp, $description);
        if ($updated) {
            $success = "Profil mis à jour avec succès";
        } else {
            $error = "Erreur lors de la mise à jour";
        }
    }

    $coach = Coach::findByUserId($user_id);
    include __DIR__ . '/../Views/coach/profile.php';
}
public function seances()
    {
        Session::requireRole('coach');
        $coach_id = $_SESSION['user_id'];
        $seances = Seance::getAllByCoach($coach_id);
        include __DIR__ . '/../Views/coach/seances.php';
    }

    public function createSeance()
    {
        Session::requireRole('coach');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = trim($_POST['titre']);
            $date = $_POST['date'];
            $heure = $_POST['heure'];
            $duree = (int)$_POST['duree'];

            if (empty($titre) || empty($date) || empty($heure) || empty($duree)) {
                $error = "Tous les champs sont obligatoires";
                include __DIR__ . '/../Views/coach/create_seance.php';
                return;
            }

            $coach_id = $_SESSION['user_id'];
            Seance::create($coach_id, $titre, $date, $heure, $duree);

            header('Location: /sport-mvc/public/coach/seances');
            exit;
        }

        include __DIR__ . '/../Views/coach/create_seance.php';
    }

}
