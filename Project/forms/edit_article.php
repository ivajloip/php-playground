<?php
    require_once('../utils/article_help.php');
    
    function generateArticleEditForm($error = NULL) {
        if(!isModerator()) {
            redirect2Home();
            return;
        }

        generateArticleForm('../forms/edit_article.tpl', setAdditionalVars, $error);
    }

    function setAdditionalVars(&$vars, &$provinces, &$categories) {
        $article = findArticleById($_GET['id'], false);
        if(NULL == $article) {
            $messages = getMessages();
            $error = $messages['error_item_not_found'];
        }
        else {
            $vars += getMessagesForArray(array('is_active')) + 
                     array('id' => $_GET['id'], 'article' => $article['article'],
                           'article_title' => $article['article_title'],
                           'is_active_checked' => $article['active'] ? 'checked' : '');
            markSelected($provinces, array($article['province']));
            markSelected($categories, $article['categories']);
        }
    }

    function parseAdditionalFields() {
        if(!isEmpty($_POST['is_active']) && $_POST['is_active'] == 'true') {
            $result['active'] = true;
        }
        else {
            $result['active'] = false;
        }
        return $result;
    }


    function submitArticle() {
        if(!isModerator()) {
            redirect2Home();
            return;
        }

        $db = getConnection();
        $articles = $db->articles;
        $article = parseArticleFromPost() + parseAdditionalFields();
        if($article == NULL) {
            $messages = getMessages();
            generateArticleEditForm($messages['error_required_value']);
            return false;
        }

        $id = $_POST['id'];
        if(!isEmpty($id)) {
            $a = findArticleById($id);
            update($articles, array('_id' => new MongoId($id)), array('$set' => $article), true, false);
            notifyFollowers($a['followers'], $_SESSION['display_name'], $id);
            redirect2('../forms/view_article.php?id=' . $id);
            return true;
        }
        return false;
    }

    genericRequestHandler(submitArticle, generateArticleEditForm);
?>
