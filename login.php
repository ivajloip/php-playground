<?php
    require_once("header.php");
    require_once("utils/db.php");
    $db = connect(null);
    echo $_POST["username"];
    echo $_POST["password"];
    echo login($_POST["username"], $_POST["password"]);
    $db->close();
?>
