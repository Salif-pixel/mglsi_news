<?php
// models/Article.php

require_once '../manager/connexion-manager.php';

class Article
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT a.*, c.libelle  
                                     FROM article a 
                                     JOIN categorie c ON a.categorie = c.id 
                                     WHERE a.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRelated($categoryId, $currentArticleId, $limit = 3)
    {
        $stmt = $this->pdo->prepare("SELECT a.id, a.titre 
                                     FROM article a 
                                     WHERE a.categorie = :categoryId AND a.id != :articleId 
                                     ORDER BY a.dateCreation DESC 
                                     LIMIT :limit");
        $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(':articleId', $currentArticleId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT a.*, c.libelle 
                                   FROM article a 
                                   JOIN categorie c ON a.categorie = c.id 
                                   ORDER BY a.dateCreation DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}