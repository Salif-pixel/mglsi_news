<?php
require_once '../config/database-config.php';
require_once '../config/categorie-config.php';


$all_categories = getAllCategories();

$catId = isset($_GET['id']) ? intval($_GET['id']) : 0;


$categorie = getCategorieById($catId);

if (!$categorie && $catId != 0) {
    echo "Catégorie non trouvée.";
    exit;
}

$articles = $catId ? getArticlesByCategorieId($catId) : [];

require_once '../views/header-view.php';
require_once '../views/categorie-view.php';
require_once '../views/articles-view.php';
require_once '../views/footer-view.php';

?>