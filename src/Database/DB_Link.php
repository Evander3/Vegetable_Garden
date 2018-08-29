<?php
declare(strict_types=1);

namespace App\Database;

class DB_Link
{
    private static $pdo;
    static private $instance;
    private static $db_name = 'db_vegetable_garden';

    private function __construct()
    {
        try {
            self::$pdo = new \PDO('mysql:host=localhost:3306', 'root', '');
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $e) {
            echo 'Connexion échouée : '.$e->getMessage();
        }
    }
    static public function create(): self
    {
        if (self::$instance === NULL)
        {
            self::$instance = new DB_Link();
            self::$instance->connect();
        }
        return self::$instance;
    }
    static function connect()
    {
        try {
            self::$pdo->query(sprintf('CREATE DATABASE IF NOT EXISTS %s CHARACTER SET utf8', self::$db_name));
            // echo 'Database '.self::$db_name.' successfully initialized<br>';
        } catch(\Exception $e) {
            echo 'Problème dans la création de la DB : '.$e->getMessage().'<br>';
        }

        $sql_query_create_vegetypes_table = "CREATE TABLE IF NOT EXISTS ".self::$db_name.".vegetypes
                                            (
                                                id INT PRIMARY KEY NOT NULL,
                                                vege_name VARCHAR(255),
                                                vege_surf INT,
                                                vege_ph INT,
                                                vege_type VARCHAR(255),
                                                vege_quant INT
                                            )";
        try {
            self::$pdo->exec($sql_query_create_vegetypes_table);
            // echo "Vegetypes table created successfully<br>";
        } catch(\PDOException $e) {
            echo 'Problème dans la création de la table des events : '.$e->getMessage().'<br>';
        }
    }
    static public function sendParams(array $data)
    {
        try {
            $sql_send_params = self::$pdo->prepare("INSERT INTO ".self::$db_name.".vegetypes (id, vege_name, vege_surf, vege_ph, vege_type)
                                        VALUES (:id, :vege_name, :vege_surf, :vege_ph, :vege_type)
                                        ON DUPLICATE KEY UPDATE vege_name=:vege_name, vege_surf=:vege_surf, vege_ph=:vege_ph, vege_type=:vege_type ");
            $rank = 0;
            foreach ($data as $key => $val)
            {
                $rank++;
                $sql_send_params->bindValue(':id',$rank, \PDO::PARAM_INT);
                $sql_send_params->bindValue(':vege_name',$key, \PDO::PARAM_STR);
                $sql_send_params->bindValue(':vege_surf', $val['surf'], \PDO::PARAM_INT);
                $sql_send_params->bindValue(':vege_ph', $val['ph'], \PDO::PARAM_INT);
                $sql_send_params->bindValue(':vege_type', $val['type'], \PDO::PARAM_STR);
                $sql_send_params->execute();
            }
            unset($key, $value, $rank);
            // echo "Params added successfully<br>";
        } catch(\PDOException $e) {
            echo 'Problème dans l\'envoi des paramètres : '.$e->getMessage().'<br>';
        }
        
    }
    
    static public function getParams()
    {
        $res = self::$pdo->query("SELECT * FROM ".self::$db_name.".vegetypes");
        $data = array();
        $rank = 1;
        foreach  ($res as $row) {
            $data[$row['vege_name']]['name'] = $row['vege_name'];
            $data[$row['vege_name']]['surf'] = intval($row['vege_surf']);
            $data[$row['vege_name']]['ph'] = intval($row['vege_ph']);
            $data[$row['vege_name']]['type'] = $row['vege_type'];
            $data[$row['vege_name']]['quant'] = intval($row['vege_quant']);
        }
        
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        return $data;
    }

    
    static public function updatePlantationTime(string $vege_name)
    {
        $res = self::$pdo->query("  UPDATE table
                                    SET nom_colonne_1 = 'nouvelle valeur'
                                    WHERE condition");
       
    }
}