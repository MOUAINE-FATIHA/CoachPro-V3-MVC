<?php
namespace Core;
class Session
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function requireLogin()
    {
        self::start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /sport-mvc/public/login');
            exit;
        }
    }

    public static function requireRole($role)
    {
        self::requireLogin();
        if ($_SESSION['role'] !== $role) {
            die("Accès interdit");
        }
    }

    public static function logout()
    {
        self::start();
        session_destroy();
    }
}
