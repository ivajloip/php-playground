<?php
    require_once('../utils/db.php');

    $messages = NULL;
    define('SALT_LENGTH', 10);

    function isEmpty($str) {
        return NULL == $str || '' == $str;
    }

    function getMessages($filename = '../forms/messages.ini') {
        global $messages;
        if(NULL == $messages) {
            $messages = parse_ini_file($filename);
            if(!$messages) {
                die('Server error, missing localization files');
            }
        }
        return $messages;
    }

    function smartyAssign($smarty, $assignArray) {
        foreach($assignArray as $key => $value) {
            $smarty->assign($key, $value);
        }
    }

    function isLoggedIn() {
        session_start();
        return isset($_SESSION['id']);
    }

    function isFormSubmitted() {
        return isset($_POST['submit']);
    }

    function isAdmin() {
        session_start();
        return $_SESSION['admin'];
    }

    function isModerator() {
        session_start();
        return $_SESSION['moderator'];
    }
    
    function redirect2Home() {
        redirect2('home.php');   
         die($messages['error_general']);
    }

    function redirect2($path) {
         header('Location: '.$path);
         die($messages['error_general']);
    }

    function redirect2Login() {
        redirect2('login_form.php');
        die($messages['error_general']);
    }

    function login($id, $display_name, $admin = FALSE, $moderator = FALSE, $avatar = FALSE) {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['display_name'] = $display_name; 
        $_SESSION['admin'] = $admin;
        $_SESSION['moderator'] = $moderator; 
        $_SESSION['avatar'] = $avatar;
    }

    function genericRequestHandler($exec_if_submit, $exe_if_logged_not_submitted, 
                $exec_if_not_logged = redirect2Login, $exec_otherwise = redirect2Home) {

        if(!isLoggedIn() && !isFormSubmitted()) {
            if(NULL != $exec_if_not_logged) {
                $exec_if_not_logged();
                return;
            }
        }
        else if(isFormSubmitted()) {
            if(NULL != $exec_if_submit) {
                $exec_if_submit();
                return;
            }
        }
        else if(isLoggedIn() && !isFormSubmitted()) {
            if(NULL != $exe_if_logged_not_submitted) {
                $exe_if_logged_not_submitted();
                return;
            }
        }
        else {
            if(NULL != $exec_otherwise) {
                $exec_otherwise();
                return;
            }
        }
    }

    function genericSmartyDisplay($vars, $page) {
        require_once('../libs/Smarty.class.php');
        $smarty = new Smarty;
        $vars += getMessagesForArray(array('title'));
	    $vars += array('user_logged' => isLoggedIn(),
                       'admin' => isAdmin(),
                       'display_name' => $_SESSION['display_name'],
                       'latest' => findLatestFiveArticles(),
                       'most_liked' => findFavouritesFiveArticles());

        // make sure error_msg is set
        if(!isset($vars['error_msg']) || isEmpty($vars['error_msg'])) {
            $vars['error_msg'] = '';
        }
        smartyAssign($smarty, $vars);
        $smarty->display($page);
        return $smarty;
    }

    function getMessagesForArray($array) {
        $result = array();
        $messages = getMessages();
        foreach($array as $value) {
            $result[$value.'_msg'] = $messages[$value];
        }
        return $result;
    }

    function removeValueFromArray(array &$array, $value) {
        $key = array_search($value, $array);
        if(FALSE !== $key) {
            unset($array[$key]);
            return TRUE;
        }
        return FALSE;
    }

    function uploadFile() {
        // no file was uploaded - it's ok
        if($_FILES['avatar']['error'] == 4) {
            return 'OK';
        }

        $limit = 200000;
        if ($_FILES['avatar']['size'] < $limit) {
            if ($_FILES['avatar']['error'] > 0) {
                return 'Error :' . $_FILES['avatar']['error'] . '<br />';
            } else {
                $fileTmpName = $_FILES['avatar']['tmp_name'];
                $filePath = getAvatarSaveLocation();
                if(move_uploaded_file($fileTmpName, $filePath)) {
                    if(saveFile($filePath)) {
                        return 'OK';
                    } else {
                        return 'error_db_filesave';
                    }
                }
                else {
                    return 'error_move_failed';
                }
            }
        } else {
            return 'error_file_size';
        }
    }

    function getAvatarFileName($id = 'no') {
        return sys_get_temp_dir() . DIRECTORY_SEPARATOR . $id . '_avatar';
    }

    function notifyFollowers($followers, $who, $articleId) {
        if(NULL != $followers && count($followers) > 0) {
	        $messages = getMessages();
	        $subject = $messages['new_activity_notification'];
	        $body = $who . $messages['new_activity_message'] . generateArticleViewLink($articleId);
	        foreach($followers as $follower) {
	            sendMail($follower, $subject, $body);
	        }
        }
    }

    function sendMail($email, $subject, $body) {
        require_once("Mail.php");
 
        $from = "Support <project.31222.80307@gmail.com>";
        $to = $email;
     
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "project.31222.80307";
        $password = "222307password";
        
        $headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject);
        $smtp =& Mail::factory('smtp', 
                              array ('host' => $host,
                                     'port' => $port,
                                     'auth' => true,
                                     'username' => $username,
                                     'password' => $password
                              )
        );
        $mail = $smtp->send($to, $headers, $body);
        if (PEAR::isError($mail)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function sendNewPasswdMail($email, $new_password) {
        $messages = getMessages();
        return sendMail($email, $messages['new_password_subject'], $messages['new_password_body'] . $new_password);
   }

    // replaces our own tag -> @@pic url={some_url}@@ with 
    // <img src="some_url" alt="picture" />
    function addImageTags($text) {
        return preg_replace('/@@pic url\=\{(.+?)\}@@/', '<img src="$1" alt="picture" class="picture" />', $text);
    }

    function removeImageTags($text) {
        return preg_replace('#\<img src\=\"(.+?)\" alt\=\"picture\" class\=\"picture\" \/\>#', '@@pic url={$1}@@', $text);
    }

    function getServerUrl() {
        return 'http://' . $_SERVER['HTTP_HOST'] . ':' . $_SERVER['SERVER_PORT'] . '/forms/';
    }

    function generateArticleViewLink($articleId) {
        return getServerUrl() . 'view_article.php?id=' . $articleId; 
    }

    function generateProfileViewLink($userId) {
        return getServerUrl() . 'edit_profile.php?id=' . $userId; 
    }

    function getAvatarSaveLocation() {
        return sys_get_temp_dir() . DIRECTORY_SEPARATOR . $_SESSION['id'] . '_avatar';
    }

?>
