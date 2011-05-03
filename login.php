<?php
    require_once('utils/db.php');
    redirect_if_appropriate();

    require_once('utils/generators.php');

    if(isSubmitted()) {
        $db = connect(null);
        $logged = login($db, $_POST["username"], $_POST["password"]);
        if(!$logged) {
            require_once('header.php');
            generate_login();
            echo('Incorrect username/password');
            $db->close();
        }
        else {
            redirect2("search.php");
        }
    }
    else {
        require_once('header.php');
        generate_login();
    }

    require_once('footer.php');
?>
