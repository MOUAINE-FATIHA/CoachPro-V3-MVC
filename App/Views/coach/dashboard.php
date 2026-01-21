<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Mon profil Coach</title>
    <style>
        body {
            background: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .h {
            color: #ffd54f;
            font-weight: bold;
        }

        .navbar {
            background: #1b3f65ff;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .navbar a {
            color: #ffd54f;
            margin-left: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            transition: 0.3s;
        }
        .btn-accept {
            background-color: #2ecc71;
        }

        .btn-accept:hover {
            background-color: #27ae60;
        }
        .btn-refuse {
            background-color: #e74c3c;
        }

        .btn-refuse:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="card">
            <h2>Mes séances</h2>

            <?php if (empty($seances)): ?>
                <p>Aucune séance créée.</p>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Durée</th>
                    </tr>
                    <?php foreach ($seances as $s): ?>
                        <tr>
                            <td><?= htmlspecialchars($s['date_seance']) ?></td>
                            <td><?= htmlspecialchars($s['heure']) ?></td>
                            <td><?= htmlspecialchars($s['duree']) ?> min</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>

        <div class="card">
            <h2>Mes réservations</h2>

            <?php if (empty($reservations)): ?>
                <p>Aucune réservation.</p>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Sportif</th>
                        <th>Date réservation</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>

                    <?php foreach ($reservations as $r): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($r['sportif_nom']) ?>
                                <?= htmlspecialchars($r['sportif_prenom']) ?>
                            </td>

                            <td><?= htmlspecialchars($r['date_reserv']) ?></td>

                            <td>
                                <?= htmlspecialchars($r['statut']) ?>
                            </td>

                            <td>
                                <?php if ($r['statut'] === 'en_attente'): ?>

                                    <a class="btn btn-accept"
                                        href="/sport-mvc/public/coach/reservation/update?id=<?= $r['id'] ?>&action=accept">
                                        Accepter
                                    </a>

                                    <a class="btn btn-refuse"
                                        href="/sport-mvc/public/coach/reservation/update?id=<?= $r['id'] ?>&action=refuse">
                                        Refuser
                                    </a>

                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif; ?>
        </div>


    </div>

</body>

</html>