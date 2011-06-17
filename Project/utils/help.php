<?php
    $messages = NULL;
    define('SALT_LENGTH', 10);

    function is_empty($str) {
        return NULL == $str || "" == $str;
    }

    function getMessages($filename = "../forms/messages.ini") {
        global $messages;
        if($messages == NULL) {
            $messages = parse_ini_file($filename);

            if(!$messages) {
                die("Server error, missing localization files");
            }
        }
        return $messages;
    }

    function parse_user_and_password_from_post() {
        if(is_empty($_POST['username']) || is_empty($_POST['password'])) {
            return NULL;
        }
        return array('username' => $_POST['username'], 
                     'passwd' => generateHash($_POST['password'], $_POST['username']));
    }

    function parse_user_reg_info_from_post() {
        if(is_empty($_POST['username']) || is_empty($_POST['password']) || is_empty($_POST['confirm_password']) || is_empty($_POST['email']) 
            || $_POST['password'] != $_POST['confirm_password']) {
            return NULL;
        }
        return array('username' => $_POST['username'], 
                     'passwd' => generateHash($_POST['password'], $_POST['username']),
                     'display_name' => $_POST['username'],
                     'email' => $_POST['email'],
                     'is_admin' => 'false',
                     'is_moderator' => 'false');

    }

    function smartyAssign($smarty, $assignArray) {
        foreach($assignArray as $key => $value) {
            $smarty->assign($key, $value);
        }
    }

    function escapeArray($array) {
        $result = array();
        foreach($array as $key=>$value) {
            $result[$key] = addslashes($value);
        }
        return $result;
    }

    function isLoggedId() {
        session_start();
        return isset($_SESSION['id']);
    }

    function isFormSubmitted() {
        return isset($_POST['submit']);
    }
    
    function redirect2Home() {
        redirect2('home.php');   
    }

    function redirect2($path) {
         header("Location: ".$path);
         die($messages['error_general']);
    }

    function redirect2Login() {
        redirect2('login_form.php');
    }

    function generateHash($plain, $username, $salt = NULL) {
         if ($salt === NULL)
         {
             $salt = substr(md5($username), 0, SALT_LENGTH / 2) . substr(md5($plain), 0, SALT_LENGTH / 2);
         }
         else
         {
             $salt = substr($salt, 0, SALT_LENGTH);
         }
        return $salt . sha1($salt . $plainText);
    }

    function Login($id, $display_name) {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['display_name'] = $display_name; 
    }

    function genericRequestHandler($exec_if_submit, $exe_if_logged_not_submitted, $exec_if_not_logged = redirect2Login, $exec_otherwise = redirect2Home) {
        if(!isLoggedId() && !isFormSubmitted()) {
            if($exec_if_not_logged != NULL) {
                $exec_if_not_logged();
                return;
            }
        }
        else if(isFormSubmitted()) {
            if($exec_if_submit != NULL) {
                $exec_if_submit();
                return;
            }
        }
        else if(isLoggedId() && !isFormSubmitted()) {
            if($exe_if_logged_not_submitted != NULL) {
                $exe_if_logged_not_submitted();
                return;
            }
        }
        else {
            if($exec_otherwise != NULL) {
                $exec_otherwise();
                return;
            }
        }
    }
?>
