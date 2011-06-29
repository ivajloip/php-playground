<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $rawArticles = findAllActiveArticles();
    $articles = array();
    $prefix = 'http://' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . '/';
    foreach($rawArticles as $article) {
        $articles[$prefix . 'forms/view_article.php?id='.$article['_id']] = $article['article_title'];
    }
    $vars = array('items' => $articles);
    genericSmartyDisplay($vars, 'list_articles.tpl');
?>
