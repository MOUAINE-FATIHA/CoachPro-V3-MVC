<?php
// var
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mon profil Coach</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #1b3f65ff;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .h {
            color: #d2a812;
        }
        nav {
            width: 100%;
            background-color: #0f2d4f;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-start;
            gap: 20px;
            margin-bottom: 30px;
        }
        

        nav a {
            margin-left: 20px;
            color: #d2a812;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #fff;
        }

        .container {
            background: white;
            padding: 30px 40px;
            width: 380px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 20px;
            color: #1b3f65ff;
            text-align: center;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #1b3f65ff;
        }

        form input[type="text"],
        form input[type="number"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #aaa;
            font-size: 14px;
            resize: vertical;
        }

        form button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            border: none;
            background: #1b3f65ff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        form button:hover {
            background: #032d5aff;
        }

        .error {
            color: red;
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
        }

        .success {
            color: green;
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
        }

    </style>
</head>
<body>

<nav>
    <div class="h">Coach</div>
    <a href="/sport-mvc/public/coach/dashboard">Dashboard</a>
    <a href="/sport-mvc/public/logout">Déconnexion</a>
</nav>

<div class="container">
    <h2>Mon profil Coach</h2>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form action="/sport-mvc/public/coach/updateProfile" method="post">
        <label for="discipline">Discipline</label>
        <input type="text" name="discipline" id="discipline" value="<?= htmlspecialchars($discipline ?? '') ?>" required>

        <label for="annees_exp">Années d'expérience</label>
        <input type="number" name="annees_exp" id="annees_exp" value="<?= htmlspecialchars($annees_exp ?? '') ?>" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4"><?= htmlspecialchars($description ?? '') ?></textarea>

        <button type="submit">Mettre à jour</button>
    </form>
</div>

</body>
</html>
