<?php
    require_once('../utils/help.php');

    function generateLoginForm($error = '') {
        $vars = getMessagesForArray(
                    array('login', 'password', 'submit', 'title'));
        $vars += array('action' => '../forms/login_form.php',
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/username_password_form.tpl");
    }

    function parseUserAndPasswordFromPost() {
        if(isEmpty($_POST['username']) || isEmpty($_POST['password'])) {
            return NULL;
        }
        return array('username' => $_POST['username'], 
                     'password' => generateHash($_POST['password'], $_POST['username']));
    }

    function submitLogin() {
        require_once('../utils/db.php');
        $db = connect();
        $users = $db->users;
        $user = parseUserAndPasswordFromPost();
        $messages = getMessages();
        if(NULL == $user) {
            generateLoginForm($messages['error_required_value']);
            return;
        }
        $result = $users->findOne(array('username' => $user['username'], 'password' => $user['password'], 'active' => true));
        if(NULL == $result) {
            generateLoginForm($messages['error_incorrect_login']);
            return;
        }
        login($result['_id'], $result['display_name'], $result['is_admin'], 
              $result['is_moderator'], $result['avatar']);
        redirect2Home();
    }

    genericRequestHandler(submitLogin, redirect2Home, generateLoginForm);
?>
