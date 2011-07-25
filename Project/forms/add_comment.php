<?php
    require_once('../utils/help.php');

    function parseCommentFromPost() {
        if(isEmpty($_POST['comment'])) {
            return NULL;
        }
        var_dump($_POST['comment']);
        return array('comment' =>  addImageTags(htmlspecialchars($_POST['comment'], ENT_QUOTES)), 
                     'publisher_id' => $_SESSION['id'],
                     'publisher_name' => $_SESSION['display_name']
               ) + 
               array('_id' => new MongoId(),
                     'published_date' => new MongoDate(time()), 
                     'liked' => array(), 
                     'liked_count' => 0,
                     'disliked' => array(),
                     'disliked_count' => 0,
                     'active' => true);
    }

    function submitComment() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $articleId = $_GET['id'];
        $article = findArticleById($articleId);
        $comments = $article['comments'];
        $comment = parseCommentFromPost();
        if($comment == NULL) {
            die($messages['error_general']);
            return false;
        }
        // TODO: optimize me to add just the comment to the end with update, not to save the whole article again
        $comments[] = $comment;
        $article['comments'] = $comments;
        $db = getConnection();
        $articles = $db->articles;
        if(!save($articles, $article)) {
            echo($message['error_general']);
            return false;
        }
        $user = findUserById($_SESSION['id']);
        if(!isset($user['followers'])) {
            $user['followers'] = array();
        }
        if(!isset($article['followers'])) {
            $article['followers'] = array();
        }
        notifyFollowers(array_unique($user['followers'] + $article['followers']) , $_SESSION['display_name'], $articleId);
        return true;
    }

    function onSubmit() {
        submitComment();
        redirect2('../forms/view_article.php?id=' . $_GET['id']);
    }

    genericRequestHandler(onSubmit, redirect2Login);
?>
