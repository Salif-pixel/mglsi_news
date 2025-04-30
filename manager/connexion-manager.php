<?php
// config/Database.php

class Database
{
    public static function getConnection()
    {
        $host = "localhost";
        $user = "mglsi_user";
        $password = "passer";
        $dbname = "mglsi_news";
        $charset = "utf8mb4";
        $port = 3307;

        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=$charset", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}



