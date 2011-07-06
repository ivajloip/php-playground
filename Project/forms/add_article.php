<?php
    require_once('../utils/article_help.php');


    function generateNewArticleForm($error = NULL) {
        generateArticleForm('../forms/add_article.tpl', NULL, $error);
    }

    function submitArticle() {
        $messages = getMessages();
        $db = getConnection();
        $articles = $db->articles;
        $article = parseArticleFromPost();
        if($article == NULL) {
            generateArticleForm($messages['error_required_value']);
            return false;
        }

        $id = $_POST['id'];
        // some additional information
        $article += array('published_date' => new MongoDate(time()), 
                    'liked' => array(), 
                    'liked_count' => 0,
                    'disliked' => array(),
                    'disliked_count' => 0,
                    'comments' => array(),
                    'active' => true);

        $inserted = insert($articles, $article);
        if(!inserted) {
            generateArticleForm($messages['error_general']);
            return false;
        }
        $id = $article['_id'];
        $user = findUserById($_SESSION['id']);
        notifyFollowers($user['followers'], $_SESSION['display_name'], $id);

        redirect2('../forms/view_article.php?id=' . $id);
        return true;
    }

    genericRequestHandler(submitArticle, generateNewArticleForm);
?>
