<?php
    require_once('../utils/article_help.php');
    require_once('../utils/db.php');

    $articles = iterator_to_array(findAllActiveArticles());
    displayArticles($articles);
?>
