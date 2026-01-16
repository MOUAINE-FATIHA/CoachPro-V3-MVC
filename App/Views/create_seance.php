<?php include __DIR__ . '/../partials/header.php'; ?>
<div class="container">
    <h2>Créer une Séance</h2>
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST" action="/sport-mvc/public/coach/seances/create">
        <input type="text" name="titre" placeholder="Titre de la séance" required>
        <input type="date" name="date" required>
        <input type="time" name="heure" required>
        <input type="number" name="duree" placeholder="Durée en minutes" required>
        <button type="submit">Créer</button>
    </form>
</div>
