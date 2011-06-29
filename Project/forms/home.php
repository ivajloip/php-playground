<?php
    require_once('../utils/help.php');
    require_once('../utils/db.php');

    if(isLoggedId()) {
        $vars = getMessagesForArray(array('avatar'));
        $file = getFile(getAvatarFileName());
        if($file != NULL) { 
            $vars += array('mime_type' => $file->file['type'], 'content' => base64_encode($file->getBytes()));
            genericSmartyDisplay($vars, '../forms/home.tpl');
        }
    }
    else {
        echo 'Not implemented yet';
    }
?>    
