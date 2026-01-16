<?php include __DIR__ . '/../partials/header.php'; ?>
<h2>Mes Séances</h2>
<a href="/sport-mvc/public/coach/seances/create">Créer une nouvelle séance</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Titre</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Durée</th>
    </tr>
    <?php foreach($seances as $s): ?>
    <tr>
        <td><?= htmlspecialchars($s['titre']) ?></td>
        <td><?= htmlspecialchars($s['date']) ?></td>
        <td><?= htmlspecialchars($s['heure']) ?></td>
        <td><?= htmlspecialchars($s['duree']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
