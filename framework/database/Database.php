<?php

namespace Cfw\Database;

use Dotenv\Dotenv;

use PDO;

class Database
{
    private static ?PDO $instance = null;

    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    private string $charset = 'utf8mb4';

    public function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
    }

    public function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}",
                $this->username,
                $this->password
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
