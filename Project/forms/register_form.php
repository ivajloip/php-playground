<?php
    require_once('../utils/help.php');

    function generateRegisterForm($error = NULL) {
        $vars = getMessagesForArray(array('login', 'password', 
                    'confirm_password', 'email', 'submit', 'title'));
        $vars += array('action' => "../forms/register_form.php",
		       'input_class' => 'input',
		       'label_class' => 'label',
		       'block' => 'modal_template',
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/register_form.tpl");
    }

    function register_user() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = getConnection();
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
