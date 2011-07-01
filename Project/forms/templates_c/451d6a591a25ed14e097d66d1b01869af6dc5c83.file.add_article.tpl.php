<?php /* Smarty version Smarty-3.0.7, created on 2011-06-30 06:11:38
         compiled from "add_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3885051374e0c139a368591-82631385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '451d6a591a25ed14e097d66d1b01869af6dc5c83' => 
    array (
      0 => 'add_article.tpl',
      1 => 1308490516,
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
  'nocache_hash' => '3885051374e0c139a368591-82631385',
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
		   
            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('article_title_label_class')->value;?>
" for"article_title"><?php echo $_smarty_tpl->getVariable('article_title_msg')->value;?>
:</label>
                <input class="<?php echo $_smarty_tpl->getVariable('article_title_class')->value;?>
" id="article_title" name="article_title" type="text"/>
            </span>

            <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                <label class="<?php echo $_smarty_tpl->getVariable('article_label_class')->value;?>
" for"article"><?php echo $_smarty_tpl->getVariable('article_label_msg')->value;?>
:</label>
                <textarea class="<?php echo $_smarty_tpl->getVariable('article_text_class')->value;?>
" id="article" name="article" cols="50" rows="6" ></textarea>
            </span>
            
            <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />
        
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
