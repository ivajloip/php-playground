<?php
    require_once('../utils/help.php');

    function generateRegisterForm() {
        require_once('../libs/Smarty.class.php');
        $messages = getMessages();
        $smarty = new Smarty;
        smartyAssign($smarty, array('login_msg' => $messages['login'], 
                                    'password_msg' => $messages['passwd'],
                                    'confirm_password_msg' => $messages['confirm_password'],
                                    'email_msg' => $messages['email'],
                                    'submit_msg' => $messages['submit'],
                                    'title' => $messages['title'],
                                    'action' => "../forms/register_form.php"));
        $smarty->display("../forms/register_form.tpl");
    }

    function register_user() {
        require_once('../utils/db.php');
        $messages = getMessages();
        $db = connect('/home/project/connection.ini');
        $users = $db->users;
        $user = parse_user_reg_info_from_post();
        if($user == NULL) {
            echo($messages['error_registering_user']);
            generateRegisterForm();
            return false;
        }
        if(!insert($users, $user)) {
            echo($messages['error_dublicating_user_info']);
            generateRegisterForm();
            return false;
        }
        login($user['_id'], $user['display_name']);
        redirect2('edit_profile.php');
        return true;
    }

    genericRequestHandler(register_user, redirect2Login, generateRegisterForm);

/*    if(!isFormSubmitted() && !isLoggedId()) {a
        generateRegisterForm();
    }
    else if(isFormSubmitted()){
        register_user();
    }
    else {
        redirect2Home();
    }*/
?>
