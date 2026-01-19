<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Coachs disponibles</h2>

    <?php foreach ($coaches as $c): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <strong><?= htmlspecialchars($c['nom'] . ' ' . $c['prenom']) ?></strong><br>
            Discipline : <?= htmlspecialchars($c['discipline']) ?><br>
            Expérience : <?= htmlspecialchars($c['annees_exp']) ?> ans<br>
            <p><?= htmlspecialchars($c['description']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>