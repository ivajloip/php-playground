<?php session_start() || print_error("Could not begin session"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>
        HW4
    </title>
</head>
<body class="body">
<div style="height: 100%; width: 100%; display: table;">
    <span class="menuItem">Welcome<?php 
        require_once('utils/db.php');
        if (isLogged()) {
            echo ', '.$_SESSION['name']; 
            echo '</span>';

            echo '<span class="menuItem"><a href="search.php">Search</a></span>';
            echo '<span class="menuItem"><a href="edit_profile.php">Profile</a></span>';
            echo '<span class="menuItem"><a href="logout.php">Logout</a></span>';
        }
        else {
            echo ', Guest';
            echo '</span>';
            echo '<span class="menuItem"><a href="login.php">Login</a></span>';
            echo '<span class="menuItem"><a href="register.php">Register</a></span>';
        }
?>     
</div>
