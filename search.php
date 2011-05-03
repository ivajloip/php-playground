<?php
    require_once('utils/db.php');
    if(!isLogged()) {
        redirect2('HW4/login.php');
    }
    // we think we should not tollerate geys, so we don't offer search for poeple from the same sex

    if(isSubmitted()) {
        require_once('header.php');
        require_once('utils/generators.php');
        $db = connect(null);
        if(!$_SESSION['male']) {
            $result = get_boys($db, $_POST);
            generate_male_table($result);
        }
        else {
            $result = get_girls($db, $_POST);
            generate_female_table($result);
        }
    }
    else {
        require_once('header.php');
        require_once('utils/generators.php');
        if($_SESSION['male']) {
            generate_search_criteria(generate_female_specific);
        }
        else {
            generate_search_criteria(generate_male_specific);
        }
    }

    require_once('footer.php');
?>
