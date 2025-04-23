<?php
// config/article-config.php

require_once 'database-config.php';

function getArticleById($id) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT a.*, c.libelle  
                          FROM article a 
                          JOIN categorie c ON a.categorie = c.id 
                          WHERE a.id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getRelatedArticles($categoryId, $currentArticleId, $limit = 3) {
     $pdo = getConnection();
     $stmt = $pdo->prepare("SELECT a.id, a.titre 
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

function getAllArticles() {
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT a.*, c.libelle 
                        FROM article a 
                        JOIN categorie c ON a.categorie = c.id 
                        ORDER BY a.dateCreation DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}