<?php
    session_start();
    require_once('utils/db.php');
    $db = connect(null);
    if(isSubmitted()) {
        $_POST['has_yaht'] = isset($_POST['has_yaht']);
        $_POST['has_villa'] = isset($_POST['has_villa']);
        if(!update_user($db, $_POST)) {
            echo "unsuccessful update"; 
        }
        else {
            redirect2('HW4/search.php');
        }
        return;
    }
    $tmp = find_user_by_id($db, $_SESSION['id']);
    if($tmp != FALSE) {
        require_once('header.php');
        require_once('utils/generators.php');
        copy2post($tmp);
        if($tmp['is_male']) {
            generate_page(generate_male_specific, "Save", 'edit_profile.php');
        }
        else {
            generate_page(generate_female_specific, "Save", 'edit_profile.php');
        }
    }
    else {
        redirect2("HW4/login.php");
    }
    require_once('footer.php');
?>
