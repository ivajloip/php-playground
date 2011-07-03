<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    function generateArticleForm($error = NULL) {
        $provinces = iterator_to_array(findAllProvinces());
        $categories = iterator_to_array(findAllCategories());

        $vars = getMessagesForArray(
                    array('article_label', 'article_title', 'empty_value',
                          'submit', 'article_province', 'article_categories'));

        // handle edit event
        if(isModerator() && !isEmpty($_GET['id'])) {
            $article = findArticleById($_GET['id'], false);
            if(NULL == $article) {
                $messages = getMessages();
                $error = $messages['error_item_not_found'];
            }
            else {
                $vars['id'] = $_GET['id'];
                $vars['article'] = $article['article'];
                $vars['article_title'] = $article['article_title'];
                markSelected($provinces, array($article['province']));
                $article_categories = $article['categories'];
                markSelected($categories, $article_categories);
            }
        }

        $vars += array('action' => '../forms/add_article.php',
                       'provinces' => $provinces,
                       'categories' => $categories,
                       'error_msg' => $error);

        genericSmartyDisplay($vars, "add_article.tpl");
    }

    function markSelected(&$toMark, $in) {
        foreach($toMark as &$item) {
            if(in_array($item['name'], $in)) {
                $item['selected'] = 'selected';
            }
        }
    }

    function parse_article_from_post() {
        $province = findProvinceById($_POST['province']);
        $categoriesSelected = findCategoriesByIds($_POST['categories']);
        $categoriesNames = array();
        foreach($categoriesSelected as $category) {
            $categoriesNames[] = $category['name'];
        }
        if(isEmpty($_POST['article']) || isEmpty($province)) {
            return NULL;
        }

        $result = array('article' =>  addImageTags(htmlspecialchars($_POST['article'], ENT_QUOTES)), 
                     'article_title' => htmlspecialchars($_POST['article_title'], ENT_QUOTES),
                     'publisher_id' => $_SESSION['id'],
                     'publisher_name' => $_SESSION['display_name'],
                     'province' => $province['name'],
                     'categories' => $categoriesNames
                  ); 

        return $result;
    }

    function submitArticle() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = connect('/home/project/connection.ini');
        $articles = $db->articles;
        $article = parse_article_from_post();
        if($article == NULL) {
            generateArticleForm($messages['error_required_value']);
            return false;
        }

        $id = $_POST['id'];
        if(isModerator() && !isEmpty($id)) {
            $a = findArticleById($id);
            update($articles, array('_id' => new MongoId($id)), array('$set' => $article), true, false);
            notifyFollowers($a['followers'], $_SESSION['display_name'], $id);
        }
        else {
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
        }

        redirect2('../forms/view_article.php?id=' . $id);
        return true;
    }

    genericRequestHandler(submitArticle, generateArticleForm);
?>
