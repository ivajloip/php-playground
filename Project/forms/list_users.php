<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $rawUsers = findAllUsers();
    $users = array();

    foreach($rawUsers as $user) {
        $users[generateProfileViewLink($user['_id'])] = $user['display_name'];
    }
    $vars = array('items' => $users);
    genericSmartyDisplay($vars, 'list_articles.tpl');
?>
