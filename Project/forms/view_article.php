<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $article_id = $_GET['id'];
    $article = findArticleById($article_id);
    if($article == NULL) {
        die("Article not found");
    }

    $vars = getMessagesForArray(array('comment_label', 'liked', 'disliked', 
                                      'submit', 'title', 'published_date',
                                      'author', 'article_province', 'follow'));
    $comments = $article['comments'];
    $vars += array('article' => $article, 'action' => '../forms/add_comment.php?id=' . $article_id);

    $file = getFile(getAvatarFileName($article['publisher_id']));
    if($file == NULL) {
        // try backup option
        $file = getFile(getAvatarFileName());
    }
    
    if($file != NULL) {
        $vars += array('mime_type' => $file->file['type'], 'content' => base64_encode($file->getBytes()));
    }

    genericSmartyDisplay($vars, '../forms/view_article.tpl');
?>
