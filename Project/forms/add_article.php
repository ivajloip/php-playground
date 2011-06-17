<?php
    require_once('../utils/help.php');

    function generate_article_form() {
        require_once('../libs/Smarty.class.php');
        $messages = getMessages();
        $smarty = new Smarty;
        smartyAssign($smarty, 
                     array('article_label_msg' => $messages['article_label'],
                                    'submit_msg' => $messages['submit'],
                                    'title' => $messages['title'],
                                    'action' => "../forms/add_article.php"));
        $smarty->display("add_article.tpl");
    }

    function parse_article_from_post() {
        if(is_empty($_POST['article'])) {
            return NULL;
        }
        return array('article' => $_POST['article'], 
                                 'publisher_id' => $_SESSION['id'],
                                 'publisher_name' => $_SESSION['display_name']
               ) + 
               array('published_date' => new MongoDate(time()), 'liked' => array(), 'disliked' => array());

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
        // view article
        return true;
    }

    genericRequestHandler(submit_article, generate_article_form);
?>
