<?php /* Smarty version Smarty-3.0.7, created on 2011-06-26 10:39:35
         compiled from "../forms/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5136236344e070c67e19cf4-38361411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '517c1e6a9febd71a381d96674accc1d43d050c86' => 
    array (
      0 => '../forms/home.tpl',
      1 => 1309084773,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308342351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5136236344e070c67e19cf4-38361411',
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
        
            <p>test implementation</p>
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <img src="data:<?php echo $_smarty_tpl->getVariable('mime_type')->value;?>
;base64,<?php echo $_smarty_tpl->getVariable('content')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('avatar_msg')->value;?>
" />
            </span>
    
    </body>
</html>
