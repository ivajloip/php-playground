<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    function generateEditProfileForm() {
        $db = getConnection();
        $user = findById($_SESSION['id'], $db->users);

        $vars = getMessagesForArray(array('login', 'password', 'display_name',
                    'confirm_password', 'email', 'submit', 'avatar', 'male', 'female'));
        $vars += array('action' => '../forms/edit_profile.php', 
                       'username_show' => 'false',
                       'max_file_size' => '200000',
                       'username_value' => $user['username'],
                       'email_value' => $user['email'],
                       'display_name_value' => $user['display_name'],
                       'male_checked' => $user['sex'] == 'male' ? 'checked' : '',
                       'female_checked' => $user['sex'] != 'male' ? 'checked' : '');
        genericSmartyDisplay($vars, "../forms/edit_profile.tpl");
    }

    function validate() {
        if(((!isEmpty($_POST['password']) && !isEmpty($_POST['confirm_password']) && 
                        $_POST['password'] == $_POST['confirm_password']) 
                    || (isEmpty($_POST['password']) && isEmpty($_POST['confirm_password'])))
                && !isEmpty($_POST['email']) && !isEmpty($_POST['display_name'])) {
            return TRUE;
        }
        return FALSE;
    }


    function parseEditInfoFromPost() {
        if(!validate($_POST)) {
            return NULL;
        }
        $result = array('email' => $_POST['email'], 'display_name' => $_POST['display_name']);
        if(!isEmpty($_POST['password'])) {
            $result['password'] = generateHash($_POST['password'], $_POST['username']);
        }
        if(!isEmpty($_POST['sex'])) {
            $result['sex'] = $_POST['sex'];
        }

        return $result;
    }

    function editProfile() {
        $db = getConnection();
        $users = $db->users;
        $update = parseEditInfoFromPost();
        if(update == NULL) {
            return false;
        }
        if(uploadFile() != 'OK') {
            return false;
        }
        else {
            $update['avatar'] = true;
        }
        $users->update(array('_id' => $_SESSION['id']), array('$set' => $update));
        redirect2Home();
        return true;
    }

    genericRequestHandler(editProfile, generateEditProfileForm);
?>
