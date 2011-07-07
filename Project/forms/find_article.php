<?php
    require_once('../utils/help.php');
    require_once('../utils/article_help.php');
    
    function generateSearchForm($error = NULL) {
        $provinces = findAllProvinces();
        $categories = findAllCategories();
        $vars = getMessagesForArray(array('text_contained_in_body', 'publisher',
                                          'text_contained_in_title', 
                                          'sort_by_likes', 'sort_by_date',
                                          'after_date', 'before_date',
                                          'article_provinces', 
                                          'article_categories',
                                          'submit'
                                          ));
        $vars += array('action' => '../forms/find_article.php',
                       'provinces' => $provinces,
                       'categories' => $categories,
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/find_article.tpl");
    }

    function validate($array) {
        $fields = array('text_contained_in_title', 'text_contained_in_body',
                        'before_date', 'after_date', 'publisher', 
                        'provinces', 'categories');
        foreach($fields as $field) {
            if(!isEmpty($array[$field])) {
                return TRUE;
            }
        }
        return FALSE;
    }

    function parseSearchRequest() {
        if(!validate($_POST)) {
            return NULL;
        }

        $result = array();
        if(!isEmpty($_POST['text_contained_in_body'])) {
            $result['article'] = new MongoRegex('/' . addImageTags(htmlspecialchars($_POST['text_contained_in_body'], ENT_QUOTES)) . '/imsu');
        }

        if(!isEmpty($_POST['text_contained_in_title'])) {
            $result['article_title'] = new MongoRegex('/' . 
                    addImageTags(htmlspecialchars($_POST['text_contained_in_title'], ENT_QUOTES)) . '/imsu');
        }

        if(!isEmpty($_POST['before_date']) && 
                preg_match('/\d\d\d\d-\d\d-\d\d/', $_POST['before_date'])) {
            $result['published_date']['$lt'] = new MongoDate(strtotime($_POST['before_date']));
        }

        if(!isEmpty($_POST['after_date']) && 
                preg_match('/\d\d\d\d-\d\d-\d\d/', $_POST['after_date'])) {
            $result['published_date']['$gt'] = new MongoDate(strtotime($_POST['after_date']));
        }
 
        if(!isEmpty($_POST['publisher'])) {
            $result['publisher_name'] = $_POST['publisher'];
        }

        if(!isEmpty($_POST['provinces'])) {
            $provincesSelected = findProvincesByIds($_POST['provinces']);
            foreach($provincesSelected as $province) {
                $provincesNames[] = $province['name'];
            }
            $result['province'] = array('$in' => $provincesNames);
        }

        if(!isEmpty($_POST['categories'])) {
            $categoriesSelected = findCategoriesByIds($_POST['categories']);
            foreach($categoriesSelected as $category) {
                $categoriesNames[] = $category['name'];
            }
            $result['categories'] = array('$in' => $categoriesNames);
        }

        return $result;
    }

    function searchForArticle() {
        $query = parseSearchRequest();
        if(NULL == $query) {
            $messages = getMessages();
            generateSearchForm($messages['error_required_value']);
            return FALSE;
        }

        if(!isEmpty($_POST['sort_order']) && 
                $_POST['sort_order'] == 'sort_by_date') {
            $sortOrder = array('published_date' => -1);
        }
        else {
            $sortOrder = array('liked_count' => -1);
        }
        $query['active'] = true;

        $db = getConnection();
        $articles = $db->articles;
        return $articles->find($query)->sort($sortOrder);
    }

    function displaySearchResults() {
        $articles = searchForArticle();
        if(FALSE === $articles) {
            return FALSE;
        }
        if(isEmpty($articles) || !$articles->hasNext()) {
            $messages = getMessages();
            displayArticles(NULL, $messages['error_no_article_found']);
            return FALSE;
        }
        displayArticles($articles);
        return TRUE;
    }

    genericRequestHandler(displaySearchResults, generateSearchForm, generateSearchForm);
?>
