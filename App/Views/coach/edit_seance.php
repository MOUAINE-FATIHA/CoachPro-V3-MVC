<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Modifier la séance</h2>

    <form method="POST" action="/sport-mvc/public/coach/seances/update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($seance['id']) ?>">

        <input type="date" name="date_seance"
               value="<?= htmlspecialchars($seance['date_seance']) ?>" required>

        <input type="time" name="heure"
               value="<?= htmlspecialchars($seance['heure']) ?>" required>

        <input type="number" name="duree"
               value="<?= htmlspecialchars($seance['duree']) ?>" required>

        <button type="submit">Mettre à jour</button>
    </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
