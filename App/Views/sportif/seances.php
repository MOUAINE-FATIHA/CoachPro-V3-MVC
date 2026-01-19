<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Séances disponibles</h2>

    <table border="1" width="100%" cellpadding="5">
        <tr>
            <th>Coach</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Durée</th>
            <th>Action</th>
        </tr>

        <?php foreach ($seances as $s): ?>
        <tr>
            <td><?= htmlspecialchars($s['nom'].' '.$s['prenom']) ?></td>
            <td><?= $s['date_seance'] ?></td>
            <td><?= $s['heure'] ?></td>
            <td><?= $s['duree'] ?> min</td>
            <td>
                <a href="/sport-mvc/public/sportif/reserver?id=<?= $s['id'] ?>">Réserver</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
