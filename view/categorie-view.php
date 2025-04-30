

<!-- Navigation des catégories - Desktop -->
<nav class="categories-nav">
    <div class="categories-nav-container">
        <h2 class="categories-title">Explorer</h2>

        <ul class="categories-menu" id="categoriesMenu">
            <li>
                <a href="index.php" <?= ($catId == 0) ? 'class="active"' : '' ?>>
                    Accueil
                </a>
            </li>
            <?php foreach($all_categories as $category): ?>
                <li>
                    <a href="index.php?category=<?= $category['id'] ?>"
                        <?= ($catId == $category['id']) ? 'class="active"' : '' ?>>
                        <?= htmlspecialchars($category['libelle']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<!-- Sidebar des catégories - Mobile -->
<div class="categories-sidebar">
    <h3>Catégories</h3>
    <ul>
        <li>
            <a href="index.php" <?= ($catId == 0) ? 'class="active"' : '' ?>>
                Accueil
            </a>
        </li>
        <?php foreach($all_categories as $category): ?>
            <li>
                <a href="categorie.php?id=<?= $category['id'] ?>"
                    <?= ($catId == $category['id']) ? 'class="active"' : '' ?>>
                    <?= htmlspecialchars($category['libelle']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>