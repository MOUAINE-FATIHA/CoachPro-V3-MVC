<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Mon profil Coach</h2>
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if(!empty($success)) echo "<p class='success'>$success</p>"; ?>

    <form method="POST" action="/sport-mvc/public/coach/profile/update">
        <input type="text" name="discipline" value="<?= htmlspecialchars($coach['discipline'] ?? '') ?>" placeholder="Discipline" required>
        <input type="number" name="annees_exp" value="<?= htmlspecialchars($coach['annees_exp'] ?? '') ?>" placeholder="Années d'expérience" required>
        <textarea name="description" placeholder="Description"><?= htmlspecialchars($coach['description'] ?? '') ?></textarea>
        <button type="submit">Mettre à jour</button>
    </form>
</div>
