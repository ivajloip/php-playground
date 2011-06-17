<?php
    require_once('../libs/Smarty.class.php');
    require_once('../utils/help.php');
    $messages = getMessages();

    function generateLoginForm() {
        global $messages;
        $smarty = new Smarty;
        smartyAssign($smarty, array('login_msg' => $messages['login'], 
                                    'password_msg' => $messages['passwd'],
                                    'submit_msg' => $messages['submit'],
                                    'title' => $messages['title']));
        $smarty->display("../forms/username_password_form.tpl");
    }

    if(!isFormSubmitted() && !isLoggedId()) {
        generateLoginForm();
        return;
    }
    else if(isFormSubmitted()){
        require_once('../utils/db.php');
        $db = connect('/home/project/connection.ini');
        $users = $db->users;
        $user = parse_user_and_password_from_post();
        if($user == NULL) {
            echo($messages['error_required_value']);
            generateLoginForm();
            return;
        }
        $result = $users->findOne(array('username' => $user['username'], 'passwd' => $user['passwd']));
        if($result == NULL) {
            echo 'Incorrect Login information <br/>';
            generateLoginForm();
            return;
        }
        login($result['_id'], $result['display_name']);
    }
    redirect2Home();
?>
