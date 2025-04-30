<?php
// index.php
require_once '../config/path-config.php';
require_once ARTICLE_CONTROLLER;



$controller = new ArticleController();

require_once HEADER_VIEW;

if (!isset($_GET['article']) && !isset($_GET['category'])) {
    $controller->showAllArticles();
} else if (isset($_GET['article'])) {
    $controller->showArticle($_GET['article']);
} else if (isset($_GET['category'])) {
    $controller->showArticlesByCategory($_GET['category']);
}

require_once FOOTER_VIEW;
