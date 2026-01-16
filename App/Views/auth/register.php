<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>

    <form id="registerForm" method="POST" action="/sport-mvc/public/register">
        <input type="text" name="nom" id="nom" placeholder="Nom" required>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>

        <select name="role" id="role" required>
            <option value="">Sélectionnez votre rôle</option>
            <option value="sportif">Sportif</option>
            <option value="coach">Coach</option>
        </select>
        <div id="coachFields" style="display:none;">
            <input type="text" name="discipline" placeholder="Discipline">
            <input type="number" name="annees_exp" placeholder="Années d'expérience">
            <textarea name="description" placeholder="Description"></textarea>
        </div>
        <button type="submit">Register</button>
    </form>

    <p class="link">Vous avez déjà un compte ? <a href="/sport-mvc/public/login">Connexion</a></p>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        let nom = document.getElementById('nom').value.trim();
        let prenom = document.getElementById('prenom').value.trim();
        let email = document.getElementById('email').value.trim();
        let password = document.getElementById('password').value.trim();
        let role = document.getElementById('role').value;
        let error = '';

        if (!nom || !prenom || !email || !password || !role) {
            error = "Tous les champs sont obligatoire";
        } else if (password.length < 3) {
            error = "Mot de passe doit être > 3 caractères";
        }

        if (error) {
            e.preventDefault();
            alert(error);
        }
    });
    const roleSelect = document.getElementById('role');
    const coachFields = document.getElementById('coachFields');

    roleSelect.addEventListener('change', function() {
        if (this.value === 'coach') {
            coachFields.style.display = 'block';
            // rendre les champs obligatoires pour coach
            coachFields.querySelectorAll('input, textarea').forEach(el => el.required = true);
        } else {
            coachFields.style.display = 'none';
            // enlever required si non coach
            coachFields.querySelectorAll('input, textarea').forEach(el => el.required = false);
        }
    });
</script>