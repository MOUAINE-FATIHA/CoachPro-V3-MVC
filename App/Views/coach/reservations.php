<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Réservations de mes séances</h2>

    <?php if (empty($reservations)): ?>
        <p>Aucune réservation pour le moment.</p>
    <?php else: ?>
        <table border="1" width="100%" cellpadding="5">
            <tr>
                <th>Sportif</th>
                <th>Date séance</th>
                <th>Heure</th>
                <th>Durée</th>
                <th>Date réservation</th>
                <th>Statut</th>
            </tr>

            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['nom'] . ' ' . $r['prenom']) ?></td>
                    <td><?= htmlspecialchars($r['date_seance']) ?></td>
                    <td><?= htmlspecialchars($r['heure']) ?></td>
                    <td><?= htmlspecialchars($r['duree']) ?> min</td>
                    <td><?= htmlspecialchars($r['date_reserv']) ?></td>
                    <td><?= htmlspecialchars($r['reservation_statut']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
