<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Mon historique</h2>

    <table border="1" width="100%" cellpadding="5">
        <tr>
            <th>Date séance</th>
            <th>Heure</th>
            <th>Durée</th>
            <th>Date réservation</th>
            <th>Statut</th>
        </tr>

        <?php foreach ($reservations as $r): ?>
        <tr>
            <td><?= $r['date_seance'] ?></td>
            <td><?= $r['heure'] ?></td>
            <td><?= $r['duree'] ?> min</td>
            <td><?= $r['date_reserv'] ?></td>
            <td><?= $r['statut'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
