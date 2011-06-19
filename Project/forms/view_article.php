<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $article_id = $_GET['id'];
    $article = findArticleById($article_id);
    $vars = getMessagesForArray(array('comment_label', 'liked', 'disliked', 'submit', 'title'));
    $vars += array('article' => $article, 'action' => '../forms/add_comment.php');
    genericSmartyDisplay($vars, '../forms/view_article.tpl');
?>
