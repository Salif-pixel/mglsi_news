<?php

$host = "localhost";
$user = "mglsi_user";
$password = "passer";
$dbname = "mglsi_news";
$charset = "utf8mb4";
function getConnection() {
    global $dbname, $host, $user, $password, $charset;
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

?>