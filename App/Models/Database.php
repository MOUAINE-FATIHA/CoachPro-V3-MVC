<?php
namespace App\Models;

use PDO;

class Database
{
    private static $pdo = null;

    public static function getInstance(){
        if (self::$pdo === null) {
            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $dbname = $_ENV['DB_NAME'] ?? 'sport_mvc';
            $user = $_ENV['DB_USER'] ?? 'postgres';
            $pass = $_ENV['DB_PASS'] ?? 'toha';

            try {
                self::$pdo = new PDO(
                    "pgsql:host=$host;dbname=$dbname",
                    $user,
                    $pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (\PDOException $e) {
                die("Erreur DB: " . $e->getMessage());
            }
        }

        return self::$pdo; 
    }
}
