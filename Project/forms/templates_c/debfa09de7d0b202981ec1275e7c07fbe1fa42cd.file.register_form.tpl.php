<?php /* Smarty version Smarty-3.0.7, created on 2011-06-25 15:00:17
         compiled from "../forms/register_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16758583874e05f801dbe732-94473710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'debfa09de7d0b202981ec1275e7c07fbe1fa42cd' => 
    array (
      0 => '../forms/register_form.tpl',
      1 => 1309008811,
      2 => 'file',
    ),
    'c9f6d8ef78b51d659237551e7911ee28ef9727fc' => 
    array (
      0 => 'username_password_form.tpl',
      1 => 1307376503,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1308340921,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308342351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16758583874e05f801dbe732-94473710',
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
">
            
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for="username"><?php echo $_smarty_tpl->getVariable('login_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="text" name="username" id="username" />
            </span>
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for"password"><?php echo $_smarty_tpl->getVariable('password_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="password" name="password" id="password">
            </span>

            
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for"confirm_password"><?php echo $_smarty_tpl->getVariable('confirm_password_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="password" name="confirm_password" id="confirm_password">
            </span>
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for"email"><?php echo $_smarty_tpl->getVariable('email_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="text" name="email" id="email">
            </span>
        

            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />

        </form>
    
    </body>
</html>
