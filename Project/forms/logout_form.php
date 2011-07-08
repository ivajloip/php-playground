<?php
    require_once('../utils/help.php');
    if(isLoggedIn()) {
        unset($_SESSION['id']);
        unset($_SESSION['display_name']);
        unset($_SESSION['avatar']);
        unset($_SESSION['admin']);
        unset($_SESSION['moderator']);
    }
    redirect2Home();
?>
