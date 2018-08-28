<?php
declare(strict_types=1);

namespace App\Database;

class Database
{
    private $pdo;
    static private $instance;

    private function __construct()
    {
        $this->pdo = new \PDO('mysql:dbname=test;host=localhost', 'root', '');
    }
    static public function create(): self
    {
        if (self::$instance === NULL)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function showTables()
    {
        $res = $this->pdo->query('SHOW TABLES');
        echo '<pre>';
        var_dump($res->fetchAll());
        echo '</pre>';
    }
}