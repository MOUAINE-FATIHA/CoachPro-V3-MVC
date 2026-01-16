<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container">
    <h2>Login</h2>
    <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if(!empty($success)) echo "<p class='success'>$success</p>"; ?>

    <form id="loginForm" method="POST" action="/sport-mvc/public/login">
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
        <button type="submit">Login</button>
    </form>
    <p class="link">Vous n'avez pas de compte ? <a href="/sport-mvc/public/register">Créer un compte</a></p>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e){
    let email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    let error = '';

    if(!email) error = "Email requis";
    else if(!password) error = "Mot de passe requis";

    if(error){
        e.preventDefault();
        alert(error);
    }
});
</script>
