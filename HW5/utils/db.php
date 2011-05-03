<?php
    require_once('utils/help.php');
    
    $filename = "../users.xml";

    function connect($file) {
        return getDoc();
    }

    function getDoc() {
        global $filename;
        $doc = new DOMDocument();
        if($doc == FALSE) {
            die ("Couldn't connect to database");
        }
        $doc->load($filename) || dir("Couldn't connect to database");
        return $doc;
    }

    function login($doc, $username, $password) {
        $query = '//user[@login="' . $username . '" and @passwd="' . sha1($password) .'"]';
        $xpath = new DOMXPath($doc);
        $result = $xpath->query($query); 
        if($result == FALSE || $result->length > 1) {
            print_error_exit('Unsuccessful login.' . $result);
        }
        else if($result != FALSE && $result->length == 1) {
            $element = $result->item(0); 
            $attributes = $element->attributes;
            $_SESSION['id'] = $attributes->getNamedItem('user_id')->value;
            $_SESSION['name'] = $attributes->getNamedItem('name')->value;
            $_SESSION['male'] = ($attributes->getNamedItem('is_male')->value == 'true');
            return TRUE;
        }
        return FALSE;
    }

    function find_user_by($doc, $unique_attr_name, $attr_value) {
        if(isEmpty($attr_value)) {
            return FALSE;
        }
        $query = '//user[@' . $unique_attr_name . '="' . $attr_value . '"]';
        $xpath = new DOMXPath($doc);
        $result = $xpath->query($query); 
        if($result == FALSE || $result->length > 1) {
            print_error_exit('Unsuccessful login.' . $result);
        }
        else if($result->length != 0) {
            $element = $result->item(0); 
            $attributes = $element->attributes;
            $ret = array();
            foreach($attributes as $attr_name => $attr_value) {
                $ret[$attr_name] = $attr_value->value;
            }
            return $ret;
        }
        return FALSE;
    }

    function find_user_by_id($doc, $id) {
        return find_user_by($doc, 'user_id', $id);
    }

    function find_user_by_login($doc, $login) {
        return find_user_by($doc, 'login', $login);
    }

    function add_user($doc, $array) {
        if(find_user_by_login($doc, $array['login'])) {
            return 'User already registered';
        }

        if(!passwords_match($array)) {
            return "Passwords dons't match";
        }

        if(isEmpty($array['passwd']) || isEmpty($array['login'])) {
            return "Required value not filled";
        }

        if($array['sex'] == 'male') {
            $array['is_male'] = 'true';
            $table = 'Boys';
        }
        else {
            $array['is_male'] = 'false';
            $table = 'Girls';
        }

        $array['user_id'] = update_next_id($doc);

        $array['passwd'] = sha1($array['passwd']);

        $user = $doc->createElement('user', '');
//        var_dump($array);
        $array = unset_unnecessary($array);
//        var_dump($array);
        foreach($array as $name => $value) {
            $user->setAttribute($name, $value);
        }
        $doc->getElementsByTagName('root')->item(0)->appendChild($user);

        global $filename;
        $result = $doc->save($filename);
        return ($result != FALSE) ? '' : 'Error';
    }

    function update_user($doc, $array) {
        if(!passwords_match($array)) {
            return FALSE;
        }
        if(!isEmpty($array['passwd'])) {
            $array['passwd'] = sha1($array['passwd']);
        } else {
            unset($array['passwd']);
        }

        $query = '//user[@login="' . $array['login_save'] . '"]';
        $xpath = new DOMXPath($doc);
        $result = $xpath->query($query); 
        if($result == FALSE || $result->length > 1) {
            print_error_exit('Unsuccessful login.' . $result);
        }
        else if($result->length != 0) {
            $user = $result->item(0); 

            if($user == FALSE) {
                return FALSE;
            }
            $array = unset_unnecessary($array);
            foreach($array as $name => $value) {
                $user->setAttribute($name, $value);
            }

            if(isLogged() && isset($array['name'])) {
                $_SESSION['name'] = $array['name'];
            }
            global $filename;
            return $doc->save($filename) != FALSE;
        }
        return FALSE;
    }


    function get_users_by_sex($doc, $sex) {
        $query = '//user[@is_male="' . $sex . '"]';
        $xpath = new DOMXPath($doc);
        $result = $xpath->query($query);
        var_dump($result);
        if($result == FALSE) {
            return array();
        }
        $ne = $result->length;
        var_dump($ne);
        $res = array();
        for($i = 0; $i < $ne; $i++) {
            $tmp = array();
            $attrs = $result->item($i)->attributes;
            foreach($attrs as $key => $value) {
                $tmp[$key] = $value->value;
            }
            array_push($res, $tmp);
        }
        return $res;       
    }

    function update_next_id($doc) {
        $result = $doc->getElementsByTagName('root');
        $element = $result->item(0);
        $next = $element->attributes->getNamedItem('last_id')->value + 1;
        $element->setAttribute('last_id', $next);
        return $next;
    }

    function reset_password($doc, $login) {
        $user = find_user_by($doc, 'login',  $login);
        
        if($user == FALSE) {
            return FALSE;
        }

        if($array['is_male']) {
            $user['sex'] = 'male';
        }
        else {
            $user['sex'] = 'female';
        }

        $user['passwd'] = generate_new_password();
        $user['passwd_confirm'] = $user['passwd'];
        $user['sex_save'] = $user['sex'];
        $result = update_user($db, $user);

        if($result == FALSE) {
            return FALSE;
        }

        if(sendNewPasswdMail($user['email'], $user['passwd'])) {
            return FALSE;
        }
        return TRUE;
    }


    function get_girls($doc) {
        return get_users_by_sex($doc, 'false');
    }

    function get_boys($doc) {
        return get_users_by_sex($doc, 'true');
    }
?>
