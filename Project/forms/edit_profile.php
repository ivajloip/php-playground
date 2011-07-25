<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    function getId() {
        if(TRUE == $_SESSION['admin'] && isset($_GET['id'])) {
            return new MongoId($_GET['id']);
        }
        return $_SESSION['id'];
    }

    function generateEditProfileForm($error = '') {
        $id = getId();
        $user = findUserById($id);

        $vars = getMessagesForArray(array('login', 'password', 'display_name',
                    'confirm_password', 'email', 'submit', 'avatar', 'male',
                    'female', 'is_admin', 'is_moderator', 'is_active'));
        $vars += array('action' => '../forms/edit_profile.php?id=' . $id, 
                       'username_show' => 'false',
                       'max_file_size' => '200000',
                       'username_value' => $user['username'],
                       'email_value' => $user['email'],
                       'display_name_value' => $user['display_name'],
                       'male_checked' => $user['sex'] == 'male' ? 'checked' : '',
                       'female_checked' => 
                            $user['sex'] == 'female' ? 'checked' : '',
                       'admin_view' => isAdmin(),
                       'is_admin_checked' => $user['is_admin'] ? 'checked' : '', 
                       'is_moderator_checked' => 
                            $user['is_moderator'] ? 'checked' : '',
                       'is_active_checked' => $user['active'] ? 'checked' : '',
			           'user_logged' => isLoggedIn(),
                       'error_msg' => $error);
        genericSmartyDisplay($vars, "../forms/edit_profile.tpl");
    }

    function validate() {
        if(((!isEmpty($_POST['password']) && !isEmpty($_POST['confirm_password']) && 
                        $_POST['password'] == $_POST['confirm_password'] && 
                        strlen($_POST['password']) > 5) 
                    || (isEmpty($_POST['password']) && isEmpty($_POST['confirm_password'])))
                && !isEmpty($_POST['email']) && !isEmpty($_POST['display_name']) 
                ) {
            return TRUE;
        }
        return FALSE;
    }


    function parseEditInfoFromPost() {
        if(!validate($_POST)) {
            return NULL;
        }
        $result = array('email' => $_POST['email'], 'display_name' => $_POST['display_name']);
        
        $_SESSION['display_name'] = $_POST['display_name']; 

        if(!isEmpty($_POST['password'])) {
            $result['password'] = generateHash($_POST['password'], $_POST['username']);
        }
        if(!isEmpty($_POST['sex'])) {
            $result['sex'] = $_POST['sex'];
        }
        if(isAdmin() && !isEmpty($_POST['is_admin']) 
                && 'true' == $_POST['is_admin']) {
            $result['is_admin'] = TRUE;
            $_SESSION['admin'] = TRUE;
        }
        else {
            $result['is_admin'] = FALSE;
            $_SESSION['admin'] = FALSE;
        }
        if(isAdmin() && 
                !isEmpty($_POST['is_moderator']) && 'true' == $_POST['is_moderator']) {
            $result['is_moderator'] = TRUE;
            $_SESSION['moderator'] = TRUE; 
        }
        else {
            $result['is_moderator'] = FALSE;
            $_SESSION['moderator'] = FALSE; 
        }
        if(!isEmpty($_POST['is_active']) && 'true' == $_POST['is_active']) {
            $result['active'] = TRUE;
        }
        else {
            $result['active'] = FALSE;
        }

        return $result;
    }

    function editProfile() {
        $db = getConnection();
        $users = $db->users;
        $update = parseEditInfoFromPost();
        if(NULL == $update) {
            generateNewArticleForm($messages['error_required_value']);
            return FALSE;
        }
        $uploadResult = uploadFile();
        var_dump($uploadResult);
        if('OK' != $uploadResult) {
            $_SESSION['avatar'] = FALSE;
            generateEditProfileForm($uploadResult);
            return FALSE;
        }
        else {
            $update['avatar'] = TRUE;
            $_SESSION['avatar'] = TRUE;
        }
        $id = getId();
        $user = findUserById($id);
        $oldEmail = $user['email'];
        $newEmail = $update['email'];
        $users->update(array('_id' => $id), array('$set' => $update));
        updateEmail($oldEmail, $newEmail);
        if($user['display_name'] != $update['display_name']) {
            updateDisplayName($update['display_name'], $id);
        }
        redirect2Home();
        return TRUE;
    }

    genericRequestHandler(editProfile, generateEditProfileForm);
?>
