<?php
    $db = NULL;
    function connect($config_file = '/home/project/connection.ini') {
        $config = parse_ini_file($config_file);
        $auth = "";
        if(!isEmpty($config['username'])) {
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

    function save($collection, $array, $save = true) {
        try {
            $collection->save($array, array('safe' => $safe));
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

    function findAllActive($collection) {
        return $collection->find(array('active' => true));
    }

    function findAllActiveArticles() {
        $db = getConnection();
        return findAllActive($db->articles);
    }

    function findById($id, $collection, $checkActive = true) {
        $query = array('_id' => new MongoId($id));
        if($checkActive) {
            $query['active'] = true;
        }
        return $collection->findOne($query);
    }

    function findUserById($id) {
        $db = getConnection();
        return findById($id, $db->users, false);
    }

    function findArticleById($id) {
        $db = getConnection();
        return findById($id, $db->articles);
    }

    function likeArticle($articleId, $userId) {
        $article = findArticleById($articleId);
        if(vote($article, 'liked', 'disliked', $userId)) {
            $db = getConnection();
            $articles = $db->articles;
            save($articles, $article);
        }
    }

    function likeComment($articleId, $commentId, $userId) {
        voteForComment($articleId, $commentId, $userId, 'liked', 'disliked');
    }

    function dislikeArticle($articleId, $userId) {
        $article = findArticleById($articleId);
        if(vote($article, 'disliked', 'liked', $userId)) {
            $db = getConnection();
            $articles = $db->articles;
            save($articles, $article);
        }
    }

    function dislikeComment($articleId, $commentId, $userId) {
        voteForComment($articleId, $commentId, $userId, 'disliked', 'liked');
    }

    function vote(&$item, $forKey, $otherKey, $userId) {
        $for = $item[$forKey];
        if(in_array($userId, $for)) {
            return FALSE;
        }

        require_once('../utils/help.php');
        if(removeValueFromArray($item[$otherKey], $userId)) {
            $item[$otherKey . '_count'] -= 1;
        }

        $item[$forKey][] = $userId;
        $item[$forKey . '_count'] += 1;
        return $item;
    }

    function findCommentById($comments, $commentId) {
        foreach($comments as $key => $comment) {
            if($comment['_id'] == $commentId) {
                return $key;
            }
        }
        return NULL;
    }

    function voteForComment($articleId, $commentId, $userId, $action, $anti_action) {
        $article = findArticleById($articleId);
        $comments = $article['comments'];
        $commentKey = findCommentById($comments, $commentId);
        if(!is_null($commentKey)) {
            if(vote($comments[$commentKey], $action, $anti_action, $userId) !== FALSE) {
                $article['comments'] = $comments;
                $db = getConnection();
                $articles = $db->articles;
                save($articles, $article);
            }
        }
    }

    function saveFile($filePath) {
        $type = mime_content_type($filePath);
        var_dump($type);
        $db = getConnection();
        $grid = $db->getGridFS();
        $grid->storeFile($filePath, array('type' => $type, '_id' => $filePath), array('safe' => $safe));
        return true;
    }

    function getFile($fileName) {
        $db = getConnection();
        $grid = $db->getGridFS();
        return $grid->findOne(array('_id' => $fileName));
    }

    // magic lives here 
    function updateDisplayName($display_name, $id) {
        $display_name = htmlspecialchars($display_name);
        $db = getConnection();
        $db->execute("db.articles.find({'comments.publisher_id' : ObjectId(\"" . $id . "\")}).forEach( function(x) { t = x.comments; t != undefined && t.forEach(function(z) { z.publisher_id.toString() == ObjectId(\"" . $id . "\").toString() && ( z.publisher_name = '$display_name' ); }); db.articles.save(x); });"); 
        $articles = $db->articles;
        $articles->update(array('publisher_id' => $id), array('$set' => array('publisher_name' => $display_name)), array('multiple' => true, 'safe' => true));
    }

?>
