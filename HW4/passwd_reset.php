<?php
    require_once('utils/db.php');

    if(isLogged()) {
        redirect2('search.php');
    }

    require_once('header.php');
    if(isSubmitted()) {
        $db = connect(null);
        $result = reset_password($db, $_POST['username']);
        if($result) {
            echo '<p>Successfully resetted the password. The new password was send to your email!</p>';
        } 
        else {
            echo '<p>An error occurred while trying reset the password. Our team has been informed and is working to solve the problem!</p>';
        }
    }
    else {
        require_once('utils/generators.php');
        generate_username_form(NULL, 'passwd_reset.php');
    }
    require_once('footer.php');
?>
