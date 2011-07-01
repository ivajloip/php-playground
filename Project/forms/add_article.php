<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    function generate_article_form($error = NULL) {
        $provinces = findAllProvinces();
        $categories = findAllCategories();
        $vars = getMessagesForArray(
                    array('article_label', 'article_title', 'empty_value',
                          'submit', 'article_province', 'article_categories'));
        $vars += array('action' => '../forms/add_article.php',
                       'provinces' => $provinces,
                       'categories' => $categories,
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "add_article.tpl");
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
        return array('article' =>  addImageTags(htmlspecialchars($_POST['article'], ENT_QUOTES)), 
                     'article_title' => htmlspecialchars($_POST['article_title'], ENT_QUOTES),
                     'publisher_id' => $_SESSION['id'],
                     'publisher_name' => $_SESSION['display_name'],
                     'province' => $province['name'],
                     'categories' => $categoriesNames
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
            generate_article_form($messages['error_required_value']);
            return false;
        }
        $inserted = insert($articles, $article);
        if(!inserted) {
            generate_article_form($messages['error_general']);
            return false;
        }
        redirect2('../forms/view_article.php?id=' . $article['_id']);
        return true;
    }

    genericRequestHandler(submit_article, generate_article_form);
?>
