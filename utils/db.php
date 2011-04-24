<?php
    function connect($db_conf_file) {
        $conf = read_conf($db_conf_file);
        $db = new mysqli($conf['host'], $conf['user'], $conf['passwd'], $conf['db_name']);
        if ($db->connect_error) {
                die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        return $db;
    }

    function read_conf($db_conf_file) {
        $result['host'] = 'localhost';
        $result['user'] = 'hw4_admin';
        $result['passwd'] = '123qwerty';
        $result['db_name'] = 'HW4';
        return $result;
    }

    function execute_query ($db, $query) {
//        $query = addslashes($query);
        $result = $db->query($query);
        return $result;
    }

    function login ($db, $username, $password) {
        $query = "SELECT u.user_id, u.name FROM User AS u WHERE u.login = '" . addslashes($username) . "' AND u.password = SHA('" . 
            addslashes($password) . "');";
        $result = execute_query($db, $query);
        if($result && $result->num_rows > 1)  {
            print_error($db->error);
        }
        if($result != FALSE) {
            $tmp = $result->fetch_assoc();
            $_SESSION['id'] = $tmp['user_id'];
            $_SESSION['name'] = $tmp['name'];
            return TRUE;
        }
        return FALSE;
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

    function add_user($db, $array) {
        if($array['passwd'] != $array['passwd_confirm']) {
            echo 'Passwords doesn\'t match';
            return false;
        }

        var_dump($array);
        if($array['sex'] == 'male') {
            $array['is_male'] = 'true';
        }
        else {
            $array['is_male'] = 'false';
        }
        $query = "INSERT INTO User(login, password, name, is_male, height) VALUES('".$array['login']."', SHA('".$array['passwd']."'), '".
            $array['name']."', ".$array['is_male'].", ".$array['height'].");";
        return execute_query($db, $query);
    }

    function redirect_if_appropriate() {
        session_start();
        if(isset($_SESSION['name'])) {
            header("Location: http://95.111.98.17:6543/HW4/search.php");
            die('Should have redirected');
        }    
    }
?>
