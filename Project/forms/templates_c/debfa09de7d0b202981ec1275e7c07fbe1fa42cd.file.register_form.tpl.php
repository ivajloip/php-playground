<?php /* Smarty version Smarty-3.0.7, created on 2011-06-29 17:03:37
         compiled from "../forms/register_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4342500344e0a2eb20972d8-80670075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'debfa09de7d0b202981ec1275e7c07fbe1fa42cd' => 
    array (
      0 => '../forms/register_form.tpl',
      1 => 1309287369,
      2 => 'file',
    ),
    'c9f6d8ef78b51d659237551e7911ee28ef9727fc' => 
    array (
      0 => 'username_password_form.tpl',
      1 => 1308903324,
      2 => 'file',
    ),
    'f09b7c3d33a69e95bc9b8df91ac2d1e1a77d758f' => 
    array (
      0 => 'default_form.tpl',
      1 => 1309366876,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1309339171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4342500344e0a2eb20972d8-80670075',
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
                <label class="label" for="username"><?php echo $_smarty_tpl->getVariable('login_msg')->value;?>
:</label>
                <input class="input" type="text" name="username" id="username" />
		<br>
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
		<br>
            </span>
            <span class="modal_template">
                <label class="label" for"email"><?php echo $_smarty_tpl->getVariable('email_msg')->value;?>
:</label>
                <input class="input" type="text" name="email" id="email">
		<br>
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
