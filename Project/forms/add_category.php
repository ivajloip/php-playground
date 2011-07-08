<?php
    require_once('../utils/help.php');

    function generatePage($error = NULL) {
        $vars = getMessagesForArray(array('category', 'submit'));
        $vars += array('action' => "../forms/add_category.php",
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/add_category.tpl");
    }

    function parseCategory() {
        if(isEmpty($_POST['name'])) {
            return NULL;
        }
        return array('name' => $_POST['name']);
    }

    function addCategory() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = getConnection();
        $categories = $db->categories;
        $category = parseCategory();
        if($category == NULL) {
            generatePage($messages['error_required_value']);
            return FALSE;
        }
        if(!insert($categories, $category)) {
            generatePage($messages['error_general']);
            return FALSE;
        }
        redirect2Home();
        return TRUE;
    }

    genericRequestHandler(addCategory, generatePage);

?>
