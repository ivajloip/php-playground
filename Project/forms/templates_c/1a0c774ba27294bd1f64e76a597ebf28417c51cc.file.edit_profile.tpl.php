<?php /* Smarty version Smarty-3.0.7, created on 2011-06-25 23:15:16
         compiled from "../forms/edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10664830834e066c0405d545-67164045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a0c774ba27294bd1f64e76a597ebf28417c51cc' => 
    array (
      0 => '../forms/edit_profile.tpl',
      1 => 1309043709,
      2 => 'file',
    ),
    'f2def3e4ea0379486f3ce4915e05e841808ef9b9' => 
    array (
      0 => 'register_form.tpl',
      1 => 1309019238,
      2 => 'file',
    ),
    'c9f6d8ef78b51d659237551e7911ee28ef9727fc' => 
    array (
      0 => 'username_password_form.tpl',
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
  'nocache_hash' => '10664830834e066c0405d545-67164045',
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
" type="text" name="email" 
                    id="email" value="<?php echo $_smarty_tpl->getVariable('email_value')->value;?>
">
            </span>

            

		    <span class="block">
		        <label for="display_name" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('display_name_msg')->value;?>
:</label>
		        <input type="text" name="display_name" value="<?php echo $_smarty_tpl->getVariable('display_name_value')->value;?>
" id="display_name" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" />
		    </span>
            
            <span class="block">
		        <label for="male" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('male_msg')->value;?>
</label>
		        <input type="radio" name="sex" value="male" id="male" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" 
                    <?php echo $_smarty_tpl->getVariable('male_checked')->value;?>
 />
		    </span>

		    <span class="block">
		        <label for="female" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('female_msg')->value;?>
</label>
		        <input type="radio" name="sex" value="female" id="female" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" 
                    <?php echo $_smarty_tpl->getVariable('female_checked')->value;?>
 />
		    </span>

		    <span class="block">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_smarty_tpl->getVariable('max_file_size')->value;?>
" /> <!-- bytes -->
                <label for="avatar"><?php echo $_smarty_tpl->getVariable('avatar_msg')->value;?>
</label>
                <input id="avatar" type="file" name="avatar"/> 
		    </span>

            
        

            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />

        </form>
    
    </body>
</html>
