<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');
    $users = findAllUsers();
    
    $vars = getMessagesForArray(array('username', 'display_name', 'email'));
    $vars += array('users' => $users);
    genericSmartyDisplay($vars, 'list_users.tpl');
?>
