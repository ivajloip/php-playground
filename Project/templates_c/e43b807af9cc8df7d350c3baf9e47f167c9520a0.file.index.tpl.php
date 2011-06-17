<?php /* Smarty version Smarty-3.0.7, created on 2011-05-10 08:18:09
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18502076004dc8f4c12e8987-98248550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1305015477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18502076004dc8f4c12e8987-98248550',
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
        <?php  $_smarty_tpl->tpl_vars['jsFile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('jsFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['jsFile']->key => $_smarty_tpl->tpl_vars['jsFile']->value){
?>
        <script src="<?php echo $_smarty_tpl->getVariable('jsFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['jsFile']->value;?>
" type="text/javascript" language="javascript" charset="utf-8"></script>
        <?php }} ?>

        <?php  $_smarty_tpl->tpl_vars['cssFile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssFiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cssFile']->key => $_smarty_tpl->tpl_vars['cssFile']->value){
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('cssFolder')->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cssFile']->value;?>
" type="text/css" media="screen" />
        <?php }} ?>
    </head>
    <body>
        <?php echo $_smarty_tpl->getVariable('message')->value;?>

    </body>
</html>
