<section class="articles-container">
    <?php if (empty($articles)): ?>
        <div class="empty-state">
            <div class="empty-state__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
            </div>
            <h3 class="empty-state__title">Aucun article disponible</h3>
            <p class="empty-state__description">
                Il n'y a pas encore d'articles publiés dans cette section.
            </p>
            <a href="index.php" class="empty-state__action">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Retour à l'accueil
            </a>
        </div>
    <?php else: ?>
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
                            <a href="../app/article.php?id=<?= $article['id'] ?>" class="article-card__link">
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
    <?php endif; ?>
</section>