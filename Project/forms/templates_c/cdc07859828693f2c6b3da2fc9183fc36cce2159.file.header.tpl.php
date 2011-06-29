<?php /* Smarty version Smarty-3.0.7, created on 2011-06-20 17:37:48
         compiled from "header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17615422704dff856ce3b3f3-26472909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdc07859828693f2c6b3da2fc9183fc36cce2159' => 
    array (
      0 => 'header.tpl',
      1 => 1308591461,
      2 => 'file',
    ),
    '995b9b2c6f4af1acb49758d0312c765314daa6e9' => 
    array (
      0 => 'login_form.tpl',
      1 => 1308590998,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1308490516,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308590842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17615422704dff856ce3b3f3-26472909',
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
	<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('jsfile')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
?> 
		<script href="../js/<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"></script>
	<?php }} ?>
	<?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssfile')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?> 
		<link href="../css/<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
"></link>
	<?php }} ?>
    </head>
    <body>
        
        <form id="<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('form_class')->value;?>
">
            
    
<a href="#dialog"><?php echo $_smarty_tpl->getVariable('link_msg')->value;?>
</a>

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
