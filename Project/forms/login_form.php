<?php
    require_once('../utils/help.php');

    function generateLoginForm($error = '') {
        $vars = getMessagesForArray(
                    array('login', 'password', 'submit', 'title'));
        $vars += array('action' => '../forms/login_form.php',
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/username_password_form.tpl");
    }

    function submitLogin() {
        require_once('../utils/db.php');
        $db = connect();
        $users = $db->users;
        $user = parse_user_and_password_from_post();
        $messages = getMessages();
        if($user == NULL) {
            generateLoginForm($messages['error_required_value']);
            return;
        }
        $result = $users->findOne(array('username' => $user['username'], 'password' => $user['password'], 'active' => true));
        if($result == NULL) {
            generateLoginForm($messages['error_incorrect_login']);
            return;
        }
        login($result['_id'], $result['display_name'], $result['is_admin'], 
              $result['is_moderator'], $result['avatar']);
        redirect2Home();
    }

    genericRequestHandler(submitLogin, redirect2Home, generateLoginForm);

?>
