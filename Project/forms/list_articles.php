<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $rawArticles = findAllArticles();
    $articles = array();
    foreach($rawArticles as $article) {
        $articles['http://95.111.98.17:6543/PHP-HW/Project/forms/view_article.php?id='.$article['_id']] = $article['article_title'];
    }
    $vars = array('items' => $articles);
    genericSmartyDisplay($vars, 'list_articles.tpl');
?>
