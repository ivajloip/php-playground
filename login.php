<?php
    require_once("utils/db.php");
    redirect_if_appropriate();

    function generate_login_form() {
        require_once("header.php");
    ?>
         <form id="login_form" action="login.php" method="post">
            <span class="block">
            <label class="label" for="username">Login:</label>
            <input class="value_input" type="text" name="username" id="username" />
            </span>
            <span class="block">
            <label class="label" for"password">Password:</label>
            <input class="value_input" type="password" name="password" id="password">
            </span>
            <input class="button" type="submit" name="submit" value="Submit" id="submit" />
        </form>
<?php        
    }

    if(isSubmitted()) {
        $db = connect(null);
        $logged = login($db, $_POST["username"], $_POST["password"]);
        if(!$logged) {
            generate_login_form();        
            echo('Incorrect username/password');
            $db->close();
        }
        else {
            redirect2("HW4/search.php");
            header("Location: http://95.111.98.17:6543/HW4/search.php");
        }
    }
    else {
        generate_login_form();
    }

    

    require_once('footer.php');
?>
