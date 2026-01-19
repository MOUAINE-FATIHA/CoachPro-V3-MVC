<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login </title>
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

        input {
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
    </style>
</head>

<body>
    <div class="container">
        <h2>Connexion</h2>

        <?php if (!empty($error)) echo "<div class='error'>" . htmlspecialchars($error) . "</div>"; ?>
        <?php if (!empty($success)) echo "<div class='success'>" . htmlspecialchars($success) . "</div>"; ?>

        <form id="loginForm" method="POST" action="/sport-mvc/public/login">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>

        <p class="link">Vous n'avez pas de compte ? <a href="/sport-mvc/public/register">Créer un compte</a></p>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value.trim();
            let error = '';

            if (!email) error = "Email requis";
            else if (!password) error = "Mot de passe requis";

            if (error) {
                e.preventDefault();
                alert(error);
            }
        });
    </script>
</body>

</html>