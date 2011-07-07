<?php
    require_once('../utils/help.php');

    function generatePage($error = NULL) {
        $vars = getMessagesForArray(array('article_categories'));
        $vars += array('action' => "../forms/add_category.php",
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/register_form.tpl");
    }

    function addCategory() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = connect('/home/project/connection.ini');
        $users = $db->users;
        $user = parse_user_reg_info_from_post();
        if($user == NULL) {
            generateRegisterForm($messages['error_registering_user']);
            return false;
        }
        if(!insert($users, $user)) {
            generateRegisterForm($messages['error_dublicating_user_info']);
            return false;
        }
        login($user['_id'], $user['display_name']);
        redirect2('edit_profile.php');
        return true;
    }

    genericRequestHandler(register_user, redirect2Login, generateRegisterForm);

?>
