<?php
    require_once('../utils/help.php');

    function generateLoginForm() {
        $messages = getMessages();
        $vars = getMessagesForArray(
                    array('login', 'password', 'submit', 'title'));
        $vars += array('action' => "../forms/login_form.php");
        genericSmartyDisplay($vars, "../forms/username_password_form.tpl");
    }

    function submitLogin() {
        require_once('../utils/db.php');
        $db = connect();
        $users = $db->users;
        $user = parse_user_and_password_from_post();
        if($user == NULL) {
            echo($messages['error_required_value']);
            generateLoginForm();
            return;
        }
        $result = $users->findOne(array('username' => $user['username'], 'password' => $user['password']));
        if($result == NULL) {
            echo 'Incorrect Login information <br/>';
            generateLoginForm();
            return;
        }
        login($result['_id'], $result['display_name']);
        redirect2Home();
    }

    genericRequestHandler(submitLogin, redirect2Home, generateLoginForm);
?>
