<?php include __DIR__ . '/../partials/header.php'; ?>
<?php include __DIR__ . '/../partials/nav.php'; ?>

<div class="container">
    <h2>Créer une séance</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="date" name="date_seance" required>
        <input type="time" name="heure" required>
        <input type="number" name="duree" placeholder="Durée (minutes)" required>
        <button type="submit">Créer</button>
    </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
