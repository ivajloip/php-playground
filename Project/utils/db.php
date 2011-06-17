<?php
    function connect($config_file) {
        $config = parse_ini_file($config_file);
        $auth = "";
        if(!is_empty($config['username'])) {
            $auth = $config['username'].':'.$config['passwd'].'@';
        }
        $conn = new Mongo('mongodb://'.$auth.$config['url'].':'.$config['port']);
        return $conn->projectdb;
    }

    function hashPassword($passwd, $username) {
        // we add some randomly generated text (it is constant)
        return sha1($username . '@0_1f*&#!~"/?+=R@' . $passwd.'$');
    }

    function insert($collection, $array, $safe = true) {
        try {
            $collection->insert($array, $safe);
        }
        catch(MongoCursorException $e) {
            return false;
        }
        return true;
    }
?>
