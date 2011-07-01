<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>{$title_msg}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        {block name=head}{/block}
  	    <link href="../css/modal.css" rel="stylesheet" type="text/css"></link>
    	<link href="../css/header_style.css" rel="stylesheet" type="text/css"></link>
	    <script src="../js/jquery-1.3.2.js" type="text/javascript"></script>
	    <script src="../js/drop_down_menu.js" type="text/javascript"></script>
	    <script src="../js/modal.js" type="text/javascript"></script>
	    <script src="../js/description.js" type="text/javascript"></script>
	    <script src="../js/ajax_requests.js" type="text/javascript"></script>
        {block name=head}{/block}
    </head>
    <body>
	<div id="header">
		<ul class="login_home" id="login_home">
			<li><a href="#" name="home">Login</a><a><img src="../gif/widjets-arrow.gif"/></a>
				<ul id="sub">
					<li class="login_sub"><a id="login" href="#dialog" name="modal_login">Login</a></li>
					<li class="login_sub"><a id="register" href="#dialog" name="modal_register">Register</a></li>
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
            <p id="error">{$error_msg}</p>
            {block name=body}{/block}
       </div>
    </body>
</html>
