<?php
    function read_conf($db_conf_file) {
        $result['host'] = 'localhost';
        $result['user'] = 'hw4_admin';
        $result['passwd'] = '123qwerty';
        $result['db_name'] = 'HW4';
        return $result;
    }

    function generate_new_password() {
        $alphabet = array("a","b","c","d", "e", "f", "1", "2", "3", "5", "4", "6", "7", "8", "9","0", "A", "R", "Z", "^", "@", "!", "Q", "$","#");
        $lengta = 10;
        $alphabetSize = count($alphabet);
        for ($i = 0; $i < $lengta; $i++) {
            $char = $alphabet[mt_rand(0, $alphabetSize - 1)];
            $result .= $char;
        }

        return $result;
    }

    function passwords_match($array) {
         if($array['passwd'] != $array['passwd_confirm']) {
            return FALSE;
        }
        return TRUE;
    }

    function sendNewPasswdMail($email, $new_password) {
        require_once("Mail.php");
 
        $from = "Support <project.31222.80307@gmail.com>";
        $to = $email;
        $subject = "New Password";
        $body = "Your new password is " . $new_password;
     
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

    function redirect_if_appropriate() {
        if(isLogged()) {
            redirect2("search.php");
        }    
    }

    function copy2post($array) {
        foreach($array AS $key => $value) {
            $_POST[$key] = $value;
        }
        if($_POST['is_male'] == TRUE) {
            $_POST['sex'] = 'male';
        }
        else {
            $_POST['sex'] = 'female';
        }
    }

    function isEmpty($str) {
        return $str == "" || $str == NULL;
    }

    function redirect2($path) {
        header("Location: ".$path);
        die('Should have redirected');
    }

    function isLogged() {
        session_start();
        return isset($_SESSION['id']);
    }

    function isSubmitted() {
        return isset($_POST['submit']);
    }

    function print_error($msg) {
        if($GLOBALS['DEBUG']) {
            die($msg);
        }
        else exit(1);
    }

    function escape_array($db, $array) {
        $result = array();
        foreach($array as $key => $value) {
            $result[$key] = $db->real_escape_string($value);
        }
        return $result;
    }


    $GLOBALS['DEBUG'] = TRUE;
?>
