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

    function update($collection, $query, $array, $safe = true, $multiple = true) {
        try {
            $collection->update($query, $array, array('multiple' => $multiple, 'safe' => $safe));
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
        return findByUniqueField('_id', new MongoId($id), $collection, $checkActive);
    }

    function findByUniqueField($fieldName, $fieldValue, $collection, $checkActive = true) {
        $query = array($fieldName => $fieldValue);
        if($checkActive) {
            $query['active'] = true;
        }
        return $collection->findOne($query);
    }

    function findAllUsers() {
        $db = getConnection();
        return findAll($db->users);
    }

    function findUserById($id) {
        $db = getConnection();
        return findById($id, $db->users, false);
    }

    function findUserByUniqueField($fieldName, $fieldValue, $checkActive = true) {
        $db = getConnection();
        return findByUniqueField($fieldName, $fieldValue, $db->users, $checkActive);
    }

    function findUserByEmail($email, $checkActive = true) {
        return findUserByUniqueField('email', $email, $checkActive);
    }

    function findUserByUsername($username, $checkActive = true) {
        return findUserByUniqueField('username', $username, $checkActive);
    }

    function findArticleById($id, $checkActive = true) {
        $db = getConnection();
        return findById($id, $db->articles, $checkActive);
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

    // article with articleId becomes followed by user with followerId
    function followArticle($articleId, $followerId) {
        $db = getConnection();
        $articles = $db->articles;
        follow($articleId, $followerId, $articles);
    }

    // user with userId becomes followed by user with followerId
    function followUser($userId, $followerId) {
        $db = getConnection();
        $users = $db->users;
        follow($userId, $followerId, $users);
    }

    // item with itemId becomes followed by user with followerId
    // param itemId : An id as string or MongoId that specifies the item to be followed
    // param followerId : The id as string or MongoId of the user who wants to follow the item
    // param collection : the collection where item lives - currently articles or users
    function follow($itemId, $followerId, $collection) {
        $user = findUserById($followerId);
        $collection->update(array('_id' => new MongoId($itemId)), 
                            array('$addToSet' => array('followers' => $user['email'])));
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

        // that was the only way that I managed to do this - find all articles 
        // which has comments from the one we search for, for every comment,
        // if the author is appropriate, change it and save the article
        $db->execute("db.articles.find({'comments.publisher_id' : ObjectId(\"" . $id . "\")}).forEach( function(x) { t = x.comments; t != undefined && t.forEach(function(z) { z.publisher_id.toString() == ObjectId(\"" . $id . "\").toString() && ( z.publisher_name = '$display_name' ); }); db.articles.save(x); });"); 
        $articles = $db->articles;
        $articles->update(array('publisher_id' => $id), array('$set' => array('publisher_name' => $display_name)), array('multiple' => true, 'safe' => true));
    }

    function updateEmail($oldEmail, $newEmail) {
        if($oldEmail == $newEmail) return;

        $db = getConnection();
        $query = array('followers' => $oldEmail);
        updateCollectionFollowers($query, $newEmail, $db->articles);
        updateCollectionFollowers($query, $newEmail, $db->users);
    }

    function updateCollectionFollowers($findQuery, $newEmail, $collection) {
        $collection->update($findQuery, array('$addToSet' => 
                                            array('followers' => $newEmail)));
        $collection->update($findQuery, array('$pull' => $findQuery));
    }

    function findAllProvinces() {
        $db = getConnection();
        return findAll($db->provinces);
    }

    function findProvinceById($id) {
        $db = getConnection();
        return findById($id, $db->provinces, false);
    }

    function findAllCategories() {
        $db = getConnection();
        return findAll($db->categories);
    }

    function findCategoriesByIds($ids) {
        $db = getConnection();
        return findItemsByIds($db->categories, $ids);
    }

    function findProvincesByIds($ids) {
        $db = getConnection();
        return findItemsByIds($db->provinces, $ids);
    }

    function findItemsByIds($collection, $ids) {
        $search = array();
        foreach($ids as $id) {
            $search[] = new MongoId($id);
        }
        return $collection->find(array('_id' => array('$in' => $search)));
    }

    function findTopNArticles($field, $count, $order = -1) {
        $articles = findAllActiveArticles();
        return $articles->sort(array($field => $order))->limit($count);
    }

    function findLatestFiveArticles() {
        return findTopNArticles('published_date', 5);
    }

    function findFavouritesFiveArticles() {
        return findTopNArticles('liked_count', 5);
    }

?>
