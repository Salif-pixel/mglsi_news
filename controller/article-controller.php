<?php

require_once '../config/path-config.php';
require_once ARTICLE_MODEL;
require_once CATEGORIE_MODEL;

class ArticleController
{

    public function __construct()
    {
        $this->articleModel = new Article();
        $this->categorieModel = new Categorie();
    }

    public function showAllArticles()
    {

        $articles = $this->articleModel->getAll(); // Retourne un tableau vide si null
        $all_categories = $this->categorieModel->getAll(); // Retourne un tableau vide si null
        $catId = 0;

        require_once CATEGORIE_VIEW;
        require_once ARTICLES_VIEW;
    }

    public function showArticle($id)
    {
        $article = $this->articleModel->getById($id);

        if (!$article) {
            require_once EMPTY_ARTICLE;
        }

        $relatedArticles = $this->articleModel->getRelated($article['categorie'], $article['id']);
        require_once ARTICLE_VIEW;
    }

    public function showArticlesByCategory($id)
    {
        $articles = $this->categorieModel->getArticlesByCategorieId($id);
        $all_categories = $this->categorieModel->getAll();
        $catId = $id;
        require_once CATEGORIE_VIEW;

        if (!$articles) {
            require_once EMPTY_ARTICLE;
        }
        require_once ARTICLES_VIEW;



    }
}