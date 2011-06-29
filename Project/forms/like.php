<?php
    session_start();
    $type = $_POST['type'];
    $articleId = $_POST['articleId'];
    $userId = $_SESSION['id'];

    require_once('../utils/help.php');
    require_once('../utils/db.php');
    if(!isLoggedId()) {
        redirect2Login();
        return;
    }
    else if(isset($_POST['like'])) {
        if($type == 'article') {
            likeArticle($articleId, $userId);    
        }
        else if($type == 'comment') {
            $commentId = $_POST['commentId'];
            likeComment($articleId, $commentId, $userId);
        }
    }
    else if(isset($_POST['dislike'])) {
        if($type == 'article') {
            dislikeArticle($articleId, $userId);    
        }
        else if($type == 'comment') {
            $commentId = $_POST['commentId'];
            dislikeComment($articleId, $commentId, $userId);
        }
    }
    redirect2('../forms/view_article.php?id=' . $articleId);
?>
