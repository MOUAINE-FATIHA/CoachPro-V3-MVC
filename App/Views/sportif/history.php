<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Réservations</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        .h {
            color: #d2a812;
        }

        nav {
            background-color: #0f2d4f;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            font-size: 16px;
        }

        nav .links a {
            margin-left: 20px;
            color: #d2a812;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav .links a:hover {
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #1b3f65;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1b3f65;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>


    <nav>
        <div class="h">Sport</div>
        <div class="links">
            <!-- <a href="/sport-mvc/public/sportif/dashboard">Dashboard</a> -->
            <a href="/sport-mvc/public/sportif/dashboard">Dashboard</a>
            <a href="/sport-mvc/public/logout">Déconnexion</a>
        </div>
    </nav>

    <div class="container">
        <h2>Mon historique de réservations</h2>

        <?php if (empty($reservations)): ?>
            <p>Aucune réservation.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Date séance</th>
                    <th>Heure</th>
                    <th>Durée</th>
                    <th>Date réservation</th>
                    <th>Statut</th>
                </tr>
                <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['date_seance']) ?></td>
                        <td><?= htmlspecialchars($r['heure']) ?></td>
                        <td><?= htmlspecialchars($r['duree']) ?> min</td>
                        <td><?= htmlspecialchars($r['date_reserv']) ?></td>
                        <td><?= htmlspecialchars($r['statut']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</body>

</html>