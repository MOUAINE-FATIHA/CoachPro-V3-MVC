<?php
namespace App\Models;

use PDO;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $env = parse_ini_file(__DIR__ . '/../../.env'); // chemin vers .env

        $host = $env['DB_HOST'] ?? 'localhost';
        $dbname = $env['DB_NAME'] ?? 'sport_mvc';
        $user = $env['DB_USER'] ?? 'postgres';
        $pass = $env['DB_PASS'] ?? '';

        $this->connection = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
