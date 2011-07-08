<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    $vars = getMessagesForArray(array('avatar'));
    session_start();
    if($_SESSION['avatar'] === TRUE) {
        $file = getFile(getAvatarFileName($_SESSION['id']));
    }
    else {
        $file = getFile(getAvatarFileName());
    }
    // try backup option
    if($file == NULL) { 
        $file = getFile(getAvatarFileName());
    }
    if($file != NULL) { 
        $vars += array('mime_type' => $file->file['type'], 'content' => chunk_split(base64_encode($file->getBytes())));
    }
    $vars += array('user_logged' => TRUE);
    genericSmartyDisplay($vars, '../forms/home.tpl');
    echo($user_logged);
?>
