<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>{$title_msg}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        {block name=head}{/block}
  	    <link href="../css/modal.css" rel="stylesheet" type="text/css"></link>
    	    <link href="../css/header_style.css" rel="stylesheet" type="text/css"></link>
	    <link href="../css/edit_profile.css" rel="stylesheet" type="text/css"></link>
	    <script src="../js/jquery-1.3.2.js" type="text/javascript"></script>
	    <script src="../js/modal.js" type="text/javascript"></script>
	    <script src="../js/description.js" type="text/javascript"></script>
	    <script src="../js/ajax_requests.js" type="text/javascript"></script>
            <script src="../js/mainMenu_navigation.js" type="text/javascript"></script>
        {block name=head}{/block}
    </head>
    <body>
	<div id="header" style="height:100px;">
		<div id="upper_rope">
			<div class="login_home" id="login_home">
				<a id="login_sub_menu" href="#" name="rope_home" class="home">Login</a>
			</div>
		
		</div>

		<table style="width:100%; margin:0; padding:0;" cellspacing="0" cellpadding="0" border="0"><tr style="height:42px;"><td>
			<div id="sub_login_div">
			{if $user_logged ne true}
				<ul id="sub" style="vertical_align:top;">
					<li class="login_sub"><a id="login" href="#dialog" name="modal_login">Login</a></li>
					<li class="login_sub"><a id="register" href="#dialog" name="modal_register">Register</a></li>
				</ul>
			{else}
				<ul id="sub">
					<li class="login_sub"><a id="login" href="logout_form.php" name="modal_logout">Logout</a></li>
				</ul>	
			{/if}
			</div>
		</td></tr>
		<tr><td>
			<div id="search">
				<form>
					<input class="search" type="text"></input>
					<a><img src="../gif/search_icon.png"/></a>
				</form>
			</div>
			<ul class="main_menu" style="height:25px;">
			      <li><a href="#" name="home">Home</a></li>
			      <li><a href="#" name="viewArticle">View articles</a></li>
			      {if $user_logged eq true}
			      <li><a href="#" name="editProfile">Edit profile</a></li>
			      <li><a href="#" name="addArticle">Add article</a></li>
                  {if $admin eq true}
                  <li><a href="#" name="viewUsers">List of users</a></li>
                  {/if}
			      {/if}
			      <li><a href="#" name="aboutUs">About us</a></li>
			</ul>
		</td></tr></table>
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
       <div id="myDiv"> 
	    <div id="test"></div>
            <p id="error">{$error_msg}</p>
            {block name=body}{/block}
       </div>
       </div>
    </body>
</html>
