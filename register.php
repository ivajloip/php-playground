<?php
    require_once('utils/db.php');
    redirect_if_appropriate();
    require_once('utils/generators.php');
    if(!isLogged() && !isset($_POST['submit'])) {
        require_once('header.php');
        generate_page();
    }
    else if(isset($_POST['submit'])) {
        $db = connect(null);
        $tmp = escape_array($db, $_POST);
        $result = add_user($db , $tmp);
        if( $result != '') {
            require_once('header.php');
            echo ($result == 'Error'? '' : $result).$db->error;
            if(isset($tmp['error'])) {
                echo $tmp['error'];
            }
            generate_page();
        }
        else {
            login($db, $_POST['login'], $_POST['passwd']);
            redirect2('HW4/edit_profile.php');
        }
    }
    require_once('footer.php');
?>
