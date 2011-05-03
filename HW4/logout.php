<?php
    session_start();
    session_destroy();
    require_once('utils/db.php');
    redirect2('login.php');
?>
