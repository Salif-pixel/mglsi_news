<?php

require_once '../config/database-config.php';
require_once '../config/article-config.php';


$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;


$article = getArticleById($articleId);

if (!$article) {
    header("HTTP/1.0 404 Not Found");
    require_once '../views/header-view.php';
    echo "<div class='error-message'>Article non trouvé</div>";
    require_once '../views/footer-view.php';
    exit;
}

$relatedArticles = getRelatedArticles($article['categorie'], $articleId);

require_once '../views/header-view.php';
?>

    <main class="article-container">
        <?php require_once '../views/article-view.php'; ?>
    </main>

<?php
require_once '../views/footer-view.php';
?>