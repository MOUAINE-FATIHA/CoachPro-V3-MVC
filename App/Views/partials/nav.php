<nav style="margin-bottom:20px; text-align:center;">
<?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'coach'): ?>
    <a href="/sport-mvc/public/coach/dashboard">Dashboard</a> |
    <a href="/sport-mvc/public/coach/profile">Mon profil</a> |
    <a href="/sport-mvc/public/coach/seances">Mes séances</a> |
    <a href="/sport-mvc/public/coach/reservations">Réservations</a> |
    <a href="/sport-mvc/public/logout">Logout</a>
<?php endif; ?>
</nav>
