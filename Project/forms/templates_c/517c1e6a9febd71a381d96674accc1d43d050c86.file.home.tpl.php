<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 06:08:37
         compiled from "../forms/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14652850264e0c12e53fbc58-80827381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '517c1e6a9febd71a381d96674accc1d43d050c86' => 
    array (
      0 => '../forms/home.tpl',
      1 => 1309376705,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1309381054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14652850264e0c12e53fbc58-80827381',
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
            
            <p>test implementation</p>
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <img src="data:<?php echo $_smarty_tpl->getVariable('mime_type')->value;?>
;base64,<?php echo $_smarty_tpl->getVariable('content')->value;?>
" alt="<?php echo $_smarty_tpl->getVariable('avatar_msg')->value;?>
" />
            </span>
    
       </div>
    </body>
</html>
