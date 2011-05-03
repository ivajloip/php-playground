<?php
    function generate_page($exec_also = NULL, $submit_value = "Next", $action = "register.php") {
        if($exec_also != NULL) {
            $edit_mode = TRUE;
        }
?>   
        <form id="reg_form" action=<?=$action?> method="post" class="margin-8">
            <span class="block">
                <label for="login" class="label" >Login:</label>
                <input type="text" name="login" id="login" class="value_input" value="<?=$_POST['login']?>" <?=$edit_mode? 'disabled' : ''?>/>    
            </span>

            <span class="block">
                <label for="passwd" class="label">Password:</label>
                <input type="password" name="passwd" id="passwd" class="value_input"/>
            </span>

            <span class="block">
                <label for="passwd_confirm" class="label">Confirm Password:</label>
                <input type="password" name="passwd_confirm" id="passwd_confirm" class="value_input" value="<?=$_POST['passwd_confirm']?>"/>
            </span>
                
            <span class="block">
                <label for="name" class="label">Name:</label>
                <input type="text" name="name" id="name" class="value_input" value="<?=$_POST['name']?>" />
            </span>

    <!--        <span class="block">
            <label for="pic" class="label">Avatar:</label>
            <input type="file" name="pic" id="pic" class="value_input" value="<?=$_POST['pic']?>" /> 
            </span>-->

            <span class="block">
                <label for="male" class="label">Male</label>
                <input type="radio" name="sex" value="male" id="male" class="value_input"
                    <?php if($_POST['sex'] == 'male') echo 'checked';?> <?=$edit_mode? 'disabled' : ''?>
                />
                <input type="hidden" name="sex_save" value="<?=$_POST['sex']?>" />
            </span>

            <span class="block">
                <label for="female" class="label">Female</label>
                <input type="radio" name="sex" value="female" id="female" class="value_input" 
                <?php if($_POST['sex'] != 'male') echo 'checked';?> <?=$edit_mode? 'disabled' : ''?>
            />
            </span>

            <span class="block">
                <label for="height" class="label">Height:</label>
                <input type="number" name="height" id="height" class="value_input" value="<?=$_POST['height']?>" /> 
            </span>

            <span class="block">
                <label for="email" class="label">Email:</label>
                <input type="text" name="email" id="email" class="value_input" value="<?=$_POST['email']?>" /> 
            </span>
<?php
        if($exec_also != NULL) {
            $exec_also();
        }
?>
            <input type="submit" class="button" name="submit" id="submit" value="<?=$submit_value?>"/>
        </form>
<?php
    }

    function generate_search_criteria($exec_also = NULL) {
        $submit_value = "Search"
?>        
            <form id="criterias" action="search.php" method="post" class="margin-8">        
                <span class="block">
                   <label for="height" class="label">Height:</label>
                    <input type="number" name="height" id="height" class="value_input" value="<?=$_POST['height']?>" /> 
                </span>
<?php
        if($exec_also != NULL) {
            $exec_also();
        }
?>
                <input type="submit" class="button" name="submit" id="submit" value="<?=$submit_value?>"/>
            </form>
<?php        
    }

    function generate_male_specific() {
?>
        <span class="block">
            <label for="salary" class="label">Salary:</label>
            <input type="number" name="salary" id="salary" class="value_input" value="<?=$_POST['salary']?>" /> 
        </span>

        <span class="block">
            <label for="car_model" class="label">Car model:</label>
            <input type="text" name="car_model" id="car_model" class="value_input" value="<?=$_POST['car_model']?>" /> 
        </span>
        
        <span class="block">
            <label for="has_yaht" class="label">Has yaht:</label>
            <input type="checkbox" name="has_yaht" id="has_yaht" class="value_input" value="<?=$_POST['has_yaht']?>" 
                <?php if($_POST['has_yaht'] == TRUE) echo 'checked';?>
            /> 
        </span>

        <span class="block">
            <label for="has_villa" class="label">Has villa:</label>
            <input type="checkbox" name="has_villa" id="has_villa" class="value_input" value="<?=$_POST['has_villa']?>" 
                <?php if($_POST['has_villa'] == TRUE) echo 'checked';?>
            /> 
        </span>
<?php    
    }

    function generate_female_specific() {
 ?>
        <span class="block">
            <label for="breast" class="label">Breast:</label>
            <input type="number" name="breast" id="breast" class="value_input" value="<?=$_POST['breast']?>" /> 
        </span>

        <span class="block">
            <label for="eyes_color" class="label">Eyes Color:</label>
            <input type="text" name="eyes_color" id="eyes_color" class="value_input" value="<?=$_POST['eyes_color']?>" /> 
        </span>
        
        <span class="block">
            <label for="hair_color" class="label">Hair Color:</label>
            <input type="text" name="hair_color" id="hair_color" class="value_input" value="<?=$_POST['hair_color']?>" /> 
        </span>

        <span class="block">
            <label for="legs_lenght" class="label">Legs Lenght:</label>
            <input type="number" name="legs_lenght" id="legs_lenght" class="value_input" value="<?=$_POST['legs_lenght']?>" /> 
        </span>
<?php    
    }

    function generate_table($result, $headers) {
        if($result != FALSE && $result->num_rows > 0) {
            echo '<table class="collapse margin-8">';
            echo '<tr class="thisBorder">';
            foreach($headers AS $var) {
                echo '<th class="thisBorder">'.$var.'</th>';
            }
            echo '</tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr class="thisBorder">';
                    foreach($headers AS $var) {
                        echo '<td class="thisBorder">'.$row[$var].'</td>';
                    }
                echo '</tr>';
            }
        
            $result->close();
            echo '</table>';
        }
        else {
            echo '<span>No one satisfies this.</span>';
        }
    }

    function generate_male_table($result) {
        generate_table($result, array('name', 'email', 'height', 'salary', 'car_model', 'has_yaht', 'has_villa'));
    }

    function generate_female_table($result) {
        generate_table($result, array('name', 'email', 'height', 'breast', 'legs_lenght', 'eyes_color', 'hair_color'));
    }

    function generate_login() {
        generate_username_form(generate_password);
    }

    function generate_password() {
?>
        <span class="block">
            <label class="label" for"password">Password:</label>
            <input class="value_input" type="password" name="password" id="password">
        </span>
<?    
    }

    function generate_username_form($exec_also = NULL, $exec_command = 'login.php') {
?>
         <form id="login_form" action=<?=$exec_command?> method="post" class="margin-8">
            <span class="block">
               <label class="label" for="username">Login:</label>
                <input class="value_input" type="text" name="username" id="username" />
            </span>
<?php
        if($exec_also != NULL) {
            $exec_also();
        }
?>
            <input class="button" type="submit" name="submit" value="Submit" id="submit" />
        </form>
<?php    
    }
?>
