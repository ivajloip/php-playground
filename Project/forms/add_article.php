<?php
    require_once('../utils/help.php');

    function generate_article_form() {
        $messages = getMessages();
        $vars = getMessagesForArray(
                    array('article_label', 'article_title', 'submit'));

        $vars += array('action' => "../forms/add_article.php");
        genericSmartyDisplay($vars, "add_article.tpl");
    }

    function parse_article_from_post() {
        if(isEmpty($_POST['article'])) {
            return NULL;
        }
        return array('article' =>  htmlspecialchars($_POST['article'], ENT_QUOTES), 
                     'article_title' => htmlspecialchars($_POST['article_title'], ENT_QUOTES),
                     'publisher_id' => $_SESSION['id'],
                     'publisher_name' => $_SESSION['display_name']
               ) + 
               array('published_date' => new MongoDate(time()), 
                     'liked' => array(), 
                     'liked_count' => 0,
                     'disliked' => array(),
                     'disliked_count' => 0,
                     'comments' => array(),
                     'active' => true);
    }

    function submit_article() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = connect('/home/project/connection.ini');
        $articles = $db->articles;
        $article = parse_article_from_post();
        if($article == NULL) {
            echo($messages['error_registering_user']);
            generate_article_form();
            return false;
        }
        $inserted = insert($articles, $article);
        if(!inserted) {
            echo($messages['error_publishing']);
            generate_article_form();
            return false;
        }
        redirect2('../forms/view_article.php?id=' . $article['_id']);
        return true;
    }

    genericRequestHandler(submit_article, generate_article_form);
?>
