<?php
// config/categorie.php

require_once 'database-config.php';

function getCategorieById($id) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getArticlesByCategorieId($id) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT a.*, c.libelle 
                          FROM article a 
                          JOIN categorie c ON a.categorie = c.id 
                          WHERE c.id = ? 
                          ORDER BY a.dateCreation DESC");
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategories() {
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT * FROM categorie ORDER BY libelle");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}