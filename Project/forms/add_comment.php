<?php
    require_once('../utils/help.php');

    function parse_comment_from_post() {
        if(isEmpty($_POST['comment'])) {
            return NULL;
        }
        return array('comment' =>  htmlspecialchars($_POST['comment'], ENT_QUOTES), 
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

    function submit_comment() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $article_id = $_GET['id'];
        $article = findArticleById($article_id);
        $comments = $article['comments'];
        $comment = parse_comment_from_post();
        if($comment == NULL) {
            echo($messages['error_registering_user']);
            return false;
        }
        $comments[] = $comment;
        $article['comments'] = $comments;
        $db = getConnection();
        $articles = $db->articles;
        if(!save($articles, $article)) {
            echo($message['error_general']);
            return false;
        }
        return true;
    }

    if(!isLoggedId()) {
        redirect2Login();
    } else if(isFormSubmitted()) {
        submit_comment();
        redirect2('../forms/view_article.php?id=' . $_GET['id']);
    }
?>
