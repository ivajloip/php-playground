<?php /* Smarty version Smarty-3.0.7, created on 2011-06-17 12:22:36
         compiled from "../forms/add_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11359025184dfb470ca9e8c5-23033107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a2749d6e5d0fe1f222a939d1b4e67613fd194e7' => 
    array (
      0 => '../forms/add_article.tpl',
      1 => 1308305705,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1307376822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11359025184dfb470ca9e8c5-23033107',
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
        <form id="<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('form_class')->value;?>
">
            
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_article_class')->value;?>
" for"confirm_password"><?php echo $_smarty_tpl->getVariable('article_label_msg')->value;?>
:</label>
                <textarea name="article" cols="50" rows="6" />
            </span>

            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />
        
        </form>
    </body>
</html>