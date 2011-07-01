<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 06:13:26
         compiled from "../forms/edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311587034e0c1406da7b41-82838111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a0c774ba27294bd1f64e76a597ebf28417c51cc' => 
    array (
      0 => '../forms/edit_profile.tpl',
      1 => 1309381054,
      2 => 'file',
    ),
    'f2def3e4ea0379486f3ce4915e05e841808ef9b9' => 
    array (
      0 => 'register_form.tpl',
      1 => 1309378288,
      2 => 'file',
    ),
    'c9f6d8ef78b51d659237551e7911ee28ef9727fc' => 
    array (
      0 => 'username_password_form.tpl',
      1 => 1309414235,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1309413904,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1309381054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311587034e0c1406da7b41-82838111',
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  	    <link href="../css/modal.css" rel="stylesheet" type="text/css"></link>
    	<link href="../css/header_style.css" rel="stylesheet" type="text/css"></link>
	    <script src="../js/jquery-1.3.2.js" type="text/javascript"></script>
	    <script src="../js/drop_down_menu.js" type="text/javascript"></script>
	    <script src="../js/modal.js" type="text/javascript"></script>
	    <script src="../js/description.js" type="text/javascript"></script>
	    <script src="../js/ajax_requests.js" type="text/javascript"></script>
    </head>
    <body>
	<div id="header">
		<ul class="login_home" id="login_home">
			<li><a href="#" name="home">Login</a><a><img src="../gif/widjets-arrow.gif"/></a>
				<ul id="sub">
					<li class="login_sub"><a href="#dialog" name="modal_login">Login</a></li>
					<li class="login_sub"><a href="#dialog" name="modal_register">Register</a></li>
				</ul>
			</li>
		</ul>
		<div id="search">
			<form>
				<input class="search" type="text"></input>
				<a><img src="../gif/search_icon.png"/></a>
			</form>
		</div>
		<ul class="main_menu">
		      <li><a href="#">Home</a></li>
		      <li><a href="#">About us</a></li>
		</ul>
	</div>
	<div id="home">Home
		<div id="most_popular">
			<ul>
				<li><a href="#">Most popular</a></li>
					<ul><li></li></ul>
			</ul>
	</div>
	<div id="most_searched">
		<ul>
			<li><a href="#">Most searched</a></li>
				<ul><li></li></ul>
		</ul>
	</div>
	</div>
       <div id="myDiv"> 
            <p id="error"><?php echo $_smarty_tpl->getVariable('error_msg')->value;?>
</p>
            
	<div id="content">
	      <form id="mainform" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('mainform_class')->value;?>
" enctype="multipart/form-data">
	      </form>
	</div>
	<div id="modal_window">
		<div id="dialog" class="window">
		       <form id="forgPass_form" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="modal_form">
 		            <span class="modal_template">
              			  <label class="label" for"email"><?php echo $_smarty_tpl->getVariable('email_msg')->value;?>
:</label>
            		      	  <input class="input" type="text" name="email" id="email">
			          <br>
				  <input class="button" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />
      			    </span>
        	      </form>
  		      <form id="modal_form" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="modal_form">
 		           

            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <?php if ($_smarty_tpl->getVariable('username_show')->value!='false'){?>
                    <label class="label" for="username"><?php echo $_smarty_tpl->getVariable('login_msg')->value;?>
:</label>
                    <input class="input" type="text" 
                    name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('username_value')->value;?>
"/>
		    <br/>
                <?php }else{ ?>
                    <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="hidden" 
                        name="username" id="username" value="<?php echo $_smarty_tpl->getVariable('username_value')->value;?>
"/>
                <?php }?>
            </span>

            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="label" for"password"><?php echo $_smarty_tpl->getVariable('password_msg')->value;?>
:</label>
                <input class="input" type="password" name="password" id="password">
		<br>
            </span>

            
            <span class="modal_template">
                <label class="label" for"confirm_password"><?php echo $_smarty_tpl->getVariable('confirm_password_msg')->value;?>
:</label>
                <input class="input" type="password" name="confirm_password" id="confirm_password">
		<br/>
            </span>
            
	    <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
" for"email"><?php echo $_smarty_tpl->getVariable('email_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" type="text" name="email" 
                    id="email" value="<?php echo $_smarty_tpl->getVariable('email_value')->value;?>
" />
		<br/>
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

            <?php if ($_smarty_tpl->getVariable('admin_view')->value==true){?>
		    <span class="block">
		        <label for="is_admin" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('is_admin_msg')->value;?>
</label>
		        <input type="checkbox" name="is_admin" value="true" id="is_admin" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" 
                    <?php echo $_smarty_tpl->getVariable('is_admin_checked')->value;?>
 />
		    </span>

		    <span class="block">
		        <label for="is_moderator" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('is_moderator_msg')->value;?>
</label>
		        <input type="checkbox" name="is_moderator" value="true" id="is_moderator" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" 
                    <?php echo $_smarty_tpl->getVariable('is_moderator_checked')->value;?>
 />
		    </span>

            <?php }?>
		    <span class="block">
		        <label for="is_active" class="<?php echo $_smarty_tpl->getVariable('label_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('is_active_msg')->value;?>
</label>
		        <input type="checkbox" name="is_active" value="true" id="is_active" class="<?php echo $_smarty_tpl->getVariable('input_class')->value;?>
" 
                    <?php echo $_smarty_tpl->getVariable('is_active_checked')->value;?>
 />
		    </span>

            
        
	    <br><br>
            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />

        	      </form>
		      <a href="#" class="close">Close</a>
		      <div id="description">Something</div>
		      <a href="#forgPass_form" name="forgotten_password" class="forgPass_link">Forgotten password?</a>
		</div>
		<div id="mask"></div>
	</div>
    
       </div>
    </body>
</html>
