
<section class="articles-container">

        <div class="articles-grid">
            <?php foreach ($articles as $article):
                $categoryClass = 'category-' . strtolower(htmlspecialchars($article['libelle']));
                ?>
                <article class="article-card">
                    <div class="article-card__content">
                        <span class="article-card__category <?= $categoryClass ?>">
                            <?= htmlspecialchars($article['libelle']) ?>
                        </span>
                        <h2 class="article-card__title"><?= htmlspecialchars($article['titre']) ?></h2>
                        <p class="article-card__excerpt"><?= nl2br(htmlspecialchars(substr($article['contenu'], 0, 150))) ?>...</p>
                        <div class="article-card__footer">
                            <span class="article-card__date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <?= date('d/m/Y', strtotime($article['dateCreation'])) ?>
                            </span>
                            <a href="../app/index.php?article=<?= $article['id'] ?>" class="article-card__link">
                                Lire la suite
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
</section>