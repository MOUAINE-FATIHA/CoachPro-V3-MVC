<?php
use App\Models\Seance;
use App\Models\Coach;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Sportif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
        }

        a { text-decoration: none; color: #333; }

        nav {
            background: #1b3f65ff;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .links a {
            margin-left: 20px;
            color: #fff;
            font-weight: bold;
        }

        nav .links a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #1b3f65ff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #1b3f65ff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        button {
            background: #1b3f65ff;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #1b3f65ff;
        }

        .section {
            margin-bottom: 40px;
        }

        .link {
            margin-top: 10px;
        }

        .error { color: red; }
        .success { color: green; }

    </style>
</head>
<body>

<nav>
    <div>Dashboard Sportif</div>
    <div class="links">
        <a href="/sport-mvc/public/sportif/dashboard">Dashboard</a>
        <a href="/sport-mvc/public/sportif/history">Mes Réservations</a>
        <a href="/sport-mvc/public/logout">Déconnexion</a>
    </div>
</nav>

<div class="container">

    <div class="section">
        <h2>Liste des Coachs Disponibles</h2>
        <?php if (!empty($coachs)): ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Discipline</th>
                    <th>Années d'expérience</th>
                    <th>Description</th>
                </tr>
                <?php foreach ($coachs as $coach): ?>
                    <tr>
                        <td><?= htmlspecialchars($coach['nom']) ?></td>
                        <td><?= htmlspecialchars($coach['prenom']) ?></td>
                        <td><?= htmlspecialchars($coach['discipline']) ?></td>
                        <td><?= htmlspecialchars($coach['annees_exp']) ?></td>
                        <td><?= htmlspecialchars($coach['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun coach disponible.</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>Séances Disponibles</h2>
        <?php if (!empty($seances)): ?>
            <table>
                <tr>
                    <th>Coach</th>
                    <th>Discipline</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Durée (min)</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($seances as $seance): ?>
                    <tr>
                        <td><?= htmlspecialchars($seance['coach_nom'] . ' ' . $seance['coach_prenom']) ?></td>
                        <td><?= htmlspecialchars($seance['discipline']) ?></td>
                        <td><?= htmlspecialchars($seance['date_seance']) ?></td>
                        <td><?= htmlspecialchars($seance['heure']) ?></td>
                        <td><?= htmlspecialchars($seance['duree']) ?></td>
                        <td>
                            <a href="/sport-mvc/public/sportif/reserver?id=<?= $seance['id'] ?>">
                                <button>Réserver</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucune séance disponible.</p>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
