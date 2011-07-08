<?php
    require_once('../utils/help.php');

    function generateRegisterForm($error = '') {
        $vars = getMessagesForArray(array('login', 'password', 
                    'confirm_password', 'email', 'submit', 'title'));
        $vars += array('action' => "../forms/register_form.php",
		       'input_class' => 'input',
		       'label_class' => 'label',
		       'block' => 'modal_template',
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/register_form.tpl");
    }

    function parseUserRegInfo() {
        if(isEmpty($_POST['username']) || isEmpty($_POST['password']) || isEmpty($_POST['confirm_password']) || isEmpty($_POST['email']) 
            || $_POST['password'] != $_POST['confirm_password'] || strlen($_POST['username']) < 3 || strlen($_POST['password']) < 6) {
            return NULL;
        }
        return array('username' => $_POST['username'], 
                     'password' => generateHash($_POST['password'], $_POST['username']),
                     'display_name' => $_POST['username'],
                     'email' => $_POST['email'],
                     'is_admin' => FALSE,
                     'is_moderator' => FALSE,
                     'active' => TRUE);
    }


    function register_user() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = getConnection();
        $users = $db->users;
        $user = parseUserRegInfo();
        if(NULL == $user) {
            generateRegisterForm($messages['error_registering_user']);
            return FALSE;
        }
        if(!insert($users, $user)) {
            generateRegisterForm($messages['error_dublicating_user_info']);
            return FALSE;
        }
        login($user['_id'], $user['display_name']);
        redirect2('edit_profile.php');
        return TRUE;
    }

    genericRequestHandler(register_user, redirect2Login, generateRegisterForm);
?>
