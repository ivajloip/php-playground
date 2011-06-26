<?php /* Smarty version Smarty-3.0.7, created on 2011-06-25 23:11:51
         compiled from "../forms/username_password_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15878676854e066b3729b5f3-28352762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62b25079cee39e4475fe67ba6e18b1522c2d125' => 
    array (
      0 => '../forms/username_password_form.tpl',
      1 => 1309043482,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1309020058,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308342351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15878676854e066b3729b5f3-28352762',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('title_msg')->value;?>
</title>
    </head>
    <body>
        
        <form id="<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('form_class')->value;?>
" enctype="multipart/form-data">
            

            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <?php if ($_smarty_tpl->getVariable('username_show')->value!='false'){?>
                    <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for="username"><?php echo $_smarty_tpl->getVariable('login_msg')->value;?>
:</label>
                    <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="text" 
                    name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('username_value')->value;?>
"/>
                <?php }else{ ?>
                    <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="hidden" 
                        name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('username_value')->value;?>
"/>
                <?php }?>
            </span>

            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for"password"><?php echo $_smarty_tpl->getVariable('password_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="password" name="password" id="password">
            </span>

            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />

        </form>
    
    </body>
</html>
