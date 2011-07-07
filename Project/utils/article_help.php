<?php
    require_once('../utils/db.php');
    require_once('../utils/help.php');
    
    function generateArticleForm($page, $execAlso = NULL, $error = NULL) {
        $provinces = iterator_to_array(findAllProvinces());
        $categories = iterator_to_array(findAllCategories());

        $vars = getMessagesForArray(
                    array('article_label', 'article_title', 'empty_value',
                          'submit', 'article_province', 'article_categories'));

        if(NULL != $execAlso) {
            $execAlso($vars, $provinces, $categories);   
        }
        else {
            $vars['action'] = '../forms/add_article.php';
        }

        $vars += array('provinces' => $provinces,
                       'categories' => $categories,
                       'error_msg' => $error);

        genericSmartyDisplay($vars, $page);
    }

    function markSelected(&$toMark, $in) {
        foreach($toMark as &$item) {
            if(in_array($item['name'], $in)) {
                $item['selected'] = 'selected';
            }
        }
    }

    function parseArticleFromPost() {
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

    function displayArticles($articles, $error = NULL) {
        $vars = getMessagesForArray(array('article_title', 'published_date', 
                                        'author', 'published_date', 
                                        'publisher_name', 'article_categories', 
                                        'article_province'));
        $vars += array('articles' => $articles,
                       'error_msg' => $error);
        genericSmartyDisplay($vars, 'list_articles.tpl');
    }
?>
