<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #1b3f65ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 35px;
            width: 360px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #1b3f65ff;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #aaa;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: none;
            background: #1b3f65ff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #032d5aff;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .success {
            color: green;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .link {
            margin-top: 12px;
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: #d2a812;
        }

        #coachFields {
            text-align: left;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Inscription</h2>

        <?php if (!empty($error)) echo "<div class='error'>" . htmlspecialchars($error) . "</div>"; ?>
        <?php if (!empty($success)) echo "<div class='success'>" . htmlspecialchars($success) . "</div>"; ?>

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

            <button type="submit">S'inscrire</button>
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
                error = "Tous les champs sont obligatoires";
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
                coachFields.querySelectorAll('input, textarea').forEach(el => el.required = true);
            } else {
                coachFields.style.display = 'none';
                coachFields.querySelectorAll('input, textarea').forEach(el => el.required = false);
            }
        });
    </script>
</body>

</html>