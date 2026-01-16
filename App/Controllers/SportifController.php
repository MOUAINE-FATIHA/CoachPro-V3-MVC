<?php
namespace App\Controllers;

use Core\Session;    // ← important ! importer Session depuis Core
use App\Models\Sportif;
use App\Models\Seance;
use App\Models\Reservation;

class SportifController
{
    public function dashboard()
    {
        Session::requireRole('sportif');   // protège l’accès
        include __DIR__ . '/../Views/sportif/dashboard.php';
    }

    public function profile()
    {
        Session::requireRole('sportif');
        $user_id = $_SESSION['user_id'];
        $sportif = Sportif::findByUserId($user_id); // si tu as cette méthode
        include __DIR__ . '/../Views/sportif/profile.php';
    }
}
