<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $rawArticles = findAllActiveArticles();
    $articles = array();

    foreach($rawArticles as $article) {
        $articles[generateArticleViewLink($article['_id'])] = $article['article_title'];
    }
    $vars = array('items' => $articles);
    genericSmartyDisplay($vars, 'list_articles.tpl');
?>
