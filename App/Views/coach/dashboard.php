<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">

    <div class="card">
        <h2>Mes séances</h2>

        <?php if(empty($seances)): ?>
            <p>Aucune séance créée.</p>
        <?php else: ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Durée</th>
            </tr>
            <?php foreach($seances as $s): ?>
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
        <?php if(empty($reservations)): ?>
            <p>Aucune réservation.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Sportif</th>
                    <th>Date</th>
                </tr>
                <?php foreach($reservations as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['sportif_nom']) ?></td>
                    <td><?= htmlspecialchars($r['date_reserv']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
