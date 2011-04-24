<?php
//    require_once('utils/db.php');
//    redirect_if_appropriate();
    require_once('header.php');

    function generate_page() {
?>   
    <form id="reg_form" action="register.php" method="post">

        <label for="login" class="label">Login:</label>
        <input type="text" name="login" id="login" class="value_input" value="<?=$_POST['login']?>"/>    

        <label for="passwd" class="label">Password:</label>
        <input type="password" name="passwd" id="passwd" class="value_input" value="<?=$_POST['passwd']?>"/>

        <label for="passwd_confirm" class="label">Confirm Password:</label>
        <input type="password" name="passwd_confirm" id="passwd_confirm" class="value_input" value="<?=$_POST['passwd_confirm']?>"/>
               
        <label for="name" class="label">Name:</label>
        <input type="text" name="name" id="name" class="value_input" value="<?=$_POST['name']?>" />

        <label for="pic" class="label">Avatar:</label>
        <input type="file" name="pic" id="pic" class="value_input" value="<?=$_POST['pic']?>" /> 

        <label for="male" class="label">Male</label>
        <input type="radio" name="sex" value="male" id="male" class="value_input" value="<?=$_POST['sex']?>" />

        <label for="female" class="label">Female</label>
        <input type="radio" name="sex" value="female" id="female" class="value_input" />

        <label for="height" class="label">Height:</label>
        <input type="number" name="height" id="height" class="value_input" value="<?=$_POST['height']?>" /> 

        <input type="submit" name="submit" id="submit" value="Next"/>
    </form>
<?php
    }

    if(!isset($_SESSION['name']) && !isset($_POST['submit'])) {
        generate_page();
    }
    else if(isset($_POST['submit'])) {
        require_once('utils/db.php');
        $db = connect(null);
        $result = add_user($db , escape_array($db, $_POST));
        if( !$result ) {
            echo $db->error;
            generate_page();
        }
        else {
            login($_POST['login'], $_POST['passwd']);
        }
    }
    echo '<span>'.$_SESSION['name'].'</span>';
    require_once('footer.php');
?>
