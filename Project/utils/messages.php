<?php
    $messages = parse_ini_file("../forms/messages.ini");
    if(!$messages) {
        die("Server error, missing localization files");
    }
?>
