<?php /* Smarty version Smarty-3.0.7, created on 2011-06-17 20:37:20
         compiled from "list_articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17070780394dfbbb008ec704-75997714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '522fb4496690e8a699316838a376f26e4ddd215b' => 
    array (
      0 => 'list_articles.tpl',
      1 => 1308342816,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308342351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17070780394dfbbb008ec704-75997714',
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
        
        <table class="table_class">
            <tr class="tr_header_class">
                <th class="th_class">
                    <?php echo $_smarty_tpl->getVariable('table_header_msg')->value;?>

                </th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
 $_smarty_tpl->tpl_vars['link']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
            <tr class="tr_class"><td class="td_class"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></td></tr>
            <?php }} ?>
        </table>
    
    </body>
</html>
