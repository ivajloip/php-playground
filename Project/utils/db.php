<?php
    $db = NULL;
    function connect($config_file = '/home/project/connection.ini') {
        $config = parse_ini_file($config_file);
        $auth = "";
        if(!is_empty($config['username'])) {
            $auth = $config['username'].':'.$config['password'].'@';
        }
        $conn = new Mongo('mongodb://'.$auth.$config['url'].':'.$config['port']);
        return $conn->projectdb;
    }

    function getConnection() {
        global $db;
        if($db == NULL) {
            $db = connect();
        }
        return $db;
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

    function insert($collection, $array, $safe = true) {
        try {
            $collection->insert($array, $safe);
        }
        catch(MongoCursorException $e) {
            return false;
        }
        return true;
    }

    function findAll($collection) {
        return $collection->find();
    }

    function findAllArticles() {
        $db = getConnection();
        return findAll($db->articles);
    }

    function findById($id, $collection) {
        return $collection->findOne(array('_id' => new MongoId($id)));
    }

    function findArticleById($id) {
        $db = getConnection();
        return findById($id, $db->articles);
    }
?>
