<?php /* Smarty version Smarty-3.0.7, created on 2011-06-20 22:08:38
         compiled from "login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11947615014dffc441750d47-39834496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '995b9b2c6f4af1acb49758d0312c765314daa6e9' => 
    array (
      0 => 'login_form.tpl',
      1 => 1308607274,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1308607417,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308607709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11947615014dffc441750d47-39834496',
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
	<script href="../js/modal.js"></script> 
	<link href="../css/modal.css"></link>
    </head>
    <body>
	<a href="#dialog" name="modal">Вход</a>
        
	<div id="modal_window">
		<div id="dialog" class="window">
  		      <form id="<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('form_class')->value;?>
">
 		           
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
		      <a href="#" class="close">Close</a>
		</div>
		<div id="mask"></div>
	</div>
    
    </body>
</html>
