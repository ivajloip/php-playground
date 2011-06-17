<?php /* Smarty version Smarty-3.0.7, created on 2011-06-06 12:50:54
         compiled from "../forms/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:714854114deccd2e12bf91-45491617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e46efd15fa30409e8b9e8309b4a767d8ee45cc4c' => 
    array (
      0 => '../forms/login_form.tpl',
      1 => 1307364652,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1307364585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714854114deccd2e12bf91-45491617',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
    </head>
    <body>
        <form id="$id" action="$action" method="post" class="$class">
            
    <span class="block">
        <label class="label_class" for="username"><?php echo $_smarty_tpl->getVariable('login_msg')->value;?>
:</label>
        <input class="input_class" type="text" name="username" id="username" />
    </span>
    <span class="block">
        <label class="label_class" for"password"><?php echo $_smarty_tpl->getVariable('password_msg')->value;?>
:</label>
        <input class="input_class" type="password" name="password" id="password">
    </span>

    <input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />

        </form>
    </body>
</html>
