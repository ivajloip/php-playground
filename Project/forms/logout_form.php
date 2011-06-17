<?php
    require_once('../utils/help.php');
    if(isLoggedId()) {
        unset($_SESSION['id']);
        unset($_SESSION['display_name']);
    }
    redirect2Home();
?>
