<?php
global $article;
$category_slug = strtolower(trim($article['libelle']));
?>

    <article class="article-full">
        <div class="article-category-image category-<?php echo htmlspecialchars($category_slug); ?>">
        <span class="article-category-banner">
            <?php echo htmlspecialchars($article['categorie']); ?>
        </span>
            <h1 class="article-hero-title"><?= htmlspecialchars($article['titre']) ?></h1>
        </div>

        <header class="article-header">
            <div class="article-meta">
                <time datetime="<?= date('Y-m-d', strtotime($article['dateCreation'])) ?>">
                    <i class="far fa-calendar-alt"></i>
                    Publié le <?= date('d/m/Y', strtotime($article['dateCreation'])) ?>
                </time>
                <?php if ($article['dateModification']): ?>
                    <span class="article-updated">
                    <i class="fas fa-pencil-alt"></i>
                    Mis à jour le <?= date('d/m/Y', strtotime($article['dateModification'])) ?>
                </span>
                <?php endif; ?>
            </div>
        </header>

        <div class="article-content">
            <?= nl2br(htmlspecialchars($article['contenu'])) ?>
        </div>

        <footer class="article-footer">
            <a href="categorie.php?id=<?= $article['categorie'] ?>" class="back-to-category">
                <i class="fas fa-arrow-left"></i> Retour à la catégorie
            </a>
        </footer>
    </article>

<?php if (!empty($relatedArticles)): ?>
    <aside class="related-articles">
        <h2 class="related-title">Articles similaires</h2>
        <div class="related-list">
            <?php foreach ($relatedArticles as $related): ?>
                <a href="article.php?id=<?= $related['id'] ?>" class="related-article">
                    <?= htmlspecialchars($related['titre']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </aside>
<?php endif; ?>