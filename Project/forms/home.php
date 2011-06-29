<?php
    require_once('../libs/Smarty.class.php');
    require_once('../utils/help.php');

    $smarty=new Smarty;
    $smarty->display('base.tpl');
    $smarty->assign('$action','login_form.php');
    echo("Not implemented yet");
?>    
