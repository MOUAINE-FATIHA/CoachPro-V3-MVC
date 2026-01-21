<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>
<div class="container">
    <h2>Mes séances</h2>
    <a href="/sport-mvc/public/coach/seances/create"> Créer une séance</a>
    <br><br>

    <?php if (empty($seances)): ?>
        <p>Aucune séance créée</p>
    <?php else: ?>
        <table border="1" width="100%" cellpadding="5">
            <tr>
                <th>Date</th>
                <th>Heure</th>
                <th>Duree</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($seances as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['date_seance']) ?></td>
                    <td><?= htmlspecialchars($s['heure']) ?></td>
                    <td><?= htmlspecialchars($s['duree']) ?> min</td>
                    <td>
                        <a href="/sport-mvc/public/coach/seances/edit?id=<?= $s['id'] ?>"></a>
                        -
                        <a href="/sport-mvc/public/coach/seances/delete?id=<?= $s['id'] ?>"
                           onclick="return confirm('Supprimer cette séance ?')"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
