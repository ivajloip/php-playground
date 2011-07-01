<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $article_id = $_GET['id'];
    $article = findArticleById($article_id);
    if($article == NULL) {
        die("Article not found");
    }

    $article['published_date'] = date('h:i:s M d, Y', $article['published_date']->sec);
    $vars = getMessagesForArray(array('comment_label', 'liked', 'disliked', 
                                      'submit', 'title', 'published_date',
                                      'author', 'article_province'));
    $comments = $article['comments'];
    foreach($comments as &$comment) {
        $comment['published_date'] = date('h:i:s M d, Y', $comment['published_date']->sec);
    }
    $article['comments'] = $comments;
    $vars += array('article' => $article, 'action' => '../forms/add_comment.php?id=' . $article_id);
    genericSmartyDisplay($vars, '../forms/view_article.tpl');
?>
