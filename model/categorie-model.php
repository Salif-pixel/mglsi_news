<?php
// models/Categorie.php

require_once '../manager/connexion-manager.php';

class Categorie
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getArticlesByCategorieId($id)
    {
        $stmt = $this->pdo->prepare("SELECT a.*, c.libelle 
                                     FROM article a 
                                     JOIN categorie c ON a.categorie = c.id 
                                     WHERE c.id = ? 
                                     ORDER BY a.dateCreation DESC");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM categorie ORDER BY libelle");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}