<?php
// index.php
require_once '../config/database-config.php';
require_once '../config/article-config.php';
require_once '../config/categorie-config.php';

// Récupérer tous les articles
$articles = getAllArticles();
$all_categories = getAllCategories();
// Charger les vues
require_once '../views/header-view.php';
require_once '../views/categorie-view.php';
require_once '../views/articles-view.php';
require_once '../views/footer-view.php';
?>