<?php session_start() || print_error("Could not begin session"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>
        HW4
    </title>
</head>
<body style="height: 100%; width:100%;">
<div>
    <span>Welcome<?php 
        if (isset($_SESSION['name'])) {
            echo ', '.$_SESSION['name']; 
        }
        else {
            echo ', Guest';
        }
?> </span>
    <span>Search</span>
    <span>Profile</span>
    <span><a href="logout.php">Logout</a></span>
</div>
