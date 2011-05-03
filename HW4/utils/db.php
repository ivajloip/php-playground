<?php
    require_once('utils/help.php');

    function connect($db_conf_file) {
        $conf = read_conf($db_conf_file);
        $db = new mysqli($conf['host'], $conf['user'], $conf['passwd'], $conf['db_name']);
        if ($db->connect_error) {
                die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        return $db;
    }

    function execute_query ($db, $query) {
        $result = $db->query($query);
        return $result;
    }

    function login ($db, $username, $password) {
        $query = "SELECT u.user_id, u.name, u.is_male FROM User AS u WHERE u.login = '" . addslashes($username) . "' AND u.password = SHA('" . 
            addslashes($password) . "');";
        $result = execute_query($db, $query);
        if($result == FALSE || $result->num_rows > 1)  {
            print_error($db->error);
            return FALSE;
        }
        if($result != FALSE && $result->num_rows != 0) {
            $tmp = $result->fetch_assoc();
            $_SESSION['id'] = $tmp['user_id'];
            $_SESSION['name'] = $tmp['name'];
            $_SESSION['male'] = ($tmp['is_male'] == '1');
            return TRUE;
        }
        return FALSE;
    }

    function find_user_by_id($db, $user_id) {
/*        if(isEmpty($user_id)) {
            return FALSE;
        }
        $query = "SELECT * FROM User AS u WHERE u.user_id = '" . $user_id . "';";

        $result = execute_query($db, $query);
        if($result == FALSE || $result->num_rows > 1)  {
            print_error($db->error);
            return FALSE;
        }
        if($result != FALSE && $result->num_rows != 0) {
            $tmp = $result->fetch_assoc();
            $result = execute_query($db, "SELECT * FROM Boys WHERE user_id = '" . $user_id . "';");
            if($result != FALSE && $result->num_rows != 0) {
                $tmp = array_merge($tmp, $result->fetch_assoc());
            }
            $result = execute_query($db, "SELECT * FROM Girls WHERE user_id = '" . $user_id . "';");
            if($result != FALSE && $result->num_rows != 0) {
                $tmp = array_merge($tmp, $result->fetch_assoc());
            }
            return $tmp;
        }
        return FALSE;*/
        return find_user_by_unique_col($db, 'u.user_id', $user_id);
    }

    function find_user_by_unique_col($db, $uc_name, $uc_value) {
        if(isEmpty($uc_value)) {
            return FALSE;
        }

        $query = "SELECT * FROM User AS u WHERE " . $uc_name . " = '" . $uc_value . "';";
        $result = execute_query($db, $query);
        if($result == FALSE || $result->num_rows > 1)  {
            print_error($db->error);
            return FALSE;
        }
        if($result != FALSE && $result->num_rows != 0) {
            $tmp = $result->fetch_assoc();
            $user_id = $tmp['user_id'];

            $result = execute_query($db, "SELECT * FROM Boys WHERE user_id = '" . $user_id . "';");
            if($result != FALSE && $result->num_rows != 0) {
                $tmp = array_merge($tmp, $result->fetch_assoc());
            }
            $result = execute_query($db, "SELECT * FROM Girls WHERE user_id = " . $user_id . ";");
            if($result != FALSE && $result->num_rows != 0) {
                $tmp = array_merge($tmp, $result->fetch_assoc());
            }
            return $tmp;
        }
        return FALSE;
    }

    function add_user($db, $array) {
        if(!passwords_match($array)) {
            return "Passwords don't match";
        }

        if(isEmpty($array['passwd']) || isEmpty($array['login'])) {
            return "Required value not filled";
        }

        if($array['sex'] == 'male') {
            $array['is_male'] = '1';
            $table = 'Boys';
        }
        else {
            $array['is_male'] = '0';
            $table = 'Girls';
        }
        $query = "INSERT INTO User(login, password, name, is_male, height, email) VALUES('".$array['login']."', SHA('".$array['passwd']."'), '".
            $array['name']."', '".$array['is_male']."', '".$array['height']."', '".$array['email']."');";

        $query2 = "INSERT INTO ".$table."(user_id) (SELECT user_id FROM User ORDER BY user_id DESC LIMIT 1);";
        return execute_query($db, $query) && execute_query($db, $query2) ? '' : "Error";
    }

    function reset_password($db, $login) {
        $user = find_user_by_unique_col($db, 'login',  $login);
        
        if($user == FALSE) {
            return FALSE;
        }

        $user['passwd'] = generate_new_password();
        $user['passwd_confirm'] = $user['passwd'];
        $user['sex_save'] = 'male';
        $result = update_user($db, $user);

        if($result == FALSE) {
            return FALSE;
        }

        if(sendNewPasswdMail($user['email'], $user['passwd'])) {
            return FALSE;
        }
        return TRUE;
    }

    function update_user($db, $array) {
        if(!passwords_match($array)) {
            return FALSE;
        }
        if(!isEmpty($array['passwd'])) {
            $passwd = ', password = SHA(\''.$array['passwd'].'\')';
        }
        $array = escape_array($db, $array);
        if($array['sex_save'] == 'male') {
            $query = "UPDATE Boys SET salary = '".$array['salary']."', has_yaht = '".(($array['has_yaht'])? '1' : '0')
                ."', has_villa = '".(($array['has_villa'])? '1' : '0')."', car_model = '".$array['car_model']."'";
        }
        else {
            $query = "UPDATE Girls SET  breast = '".$array['breast']."', eyes_color = '".$array['eyes_color']."', hair_color = '".
                $array['hair_color']."', legs_lenght = '".$array['legs_lenght'] . "';";

        }
        if(isLogged() && isset($array['name'])) {
            $_SESSIOaN['name'] = $array['name'];
        }
        $query .= " WHERE user_id = '".$array['user_id']."';";
        $query1 = "UPDATE User SET height = '" . $array['height'] . "'" . $passwd.", name = '" . $array['name'].
            "', email = '" . $array['email'] . "' WHERE user_id = '" . $array['user_id']."';";
//        echo $query . $query1;
        return execute_query($db, $query) && execute_query($db, $query1);
    }

    function get_boys($db, $array) {
        $array = escape_array($db, $array);
        $has_yaht = isset($array['has_yaht']) && !isEmpty($array['has_yaht']) && $array['has_yaht'] != "''" ? ' AND has_yaht = 1' : '';
        $has_villa = isset($array['has_villa']) && !isEmpty($array['has_villa']) && $array['has_villa'] != "''" ? ' AND has_villa = 1' : '';
        $salary = isset($array['salary']) && !isEmpty($array['salary']) && $array['salary'] != "''" ? ' AND salary >= '.$array['salary'] : '';
        $height = isset($array['height']) && !isEmpty($array['height']) && $array['height'] != "''" ? ' AND height >= '.$array['height'] : '';
        $car_model = isset($array['car_model']) && !isEmpty($array['car_model']) && $array['car_model'] != "''" ? 
            ' AND car_model LIKE \''.$array['car_model'].'\'' : '';
        $query = "SELECT u.name, u.height, u.email, b.* FROM User AS u JOIN Boys AS b ON (b.user_id = u.user_id) WHERE 1 = 1".$has_yaht.$has_villa.
            $salary.$height.$car_model.";";
        $result = execute_query($db, $query);
        return $result;
    }

    function get_girls($db, $array) {
        $array = escape_array($db, $array);
        $breast = isset($array['breast']) && !isEmpty($array['breast']) && $array['breast'] != "''" ? ' AND breast >= '.$array['breast'] : '';
        $legs_lenght = isset($array['legs_lenght']) && !isEmpty($array['legs_lenght']) && $array['legs_lenght'] != "''" ? 
            ' AND legs_lenght >='.$array['legs_lenght'] : '';
        $eyes_color = isset($array['eyes_color']) && !isEmpty($array['eyes_color']) && $array['eyes_color'] != "''" ? 
            ' AND eyes_color LIKE \''.$array['eyes_color'].'\'' : '';
        $height = isset($array['height']) && !isEmpty($array['height']) && $array['height'] != "''" ? ' AND height >= '.$array['height'] : '';
        $hair_color = isset($array['hair_color']) && !isEmpty($array['hair_color']) && $array['hair_color'] != "''" ? 
            ' AND hair_color LIKE \''.$array['hair_color'].'\'' : '';
        $query = "SELECT u.name, u.height, u.email, g.* FROM User AS u JOIN Girls AS g ON (g.user_id = u.user_id) WHERE 1 = 1".$breast.$legs_lenght.
            $eyes_color.$height.$hair_color.";";
        $result = execute_query($db, $query);
        return $result;
    }
?>
