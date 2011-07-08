<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>{$title_msg}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        {block name=head}{/block}
  	    <link href="../css/modal.css" rel="stylesheet" type="text/css"></link>
    	<link href="../css/header_style.css" rel="stylesheet" type="text/css"></link>
	    <link href="../css/edit_profile.css" rel="stylesheet" type="text/css"></link>
        <link href="../css/main_page.css" rel="stylesheet" type="text/css"></link>
        <link href="../css/view_articles.css" rel="stylesheet" type="text/css"></link>
        <link href="../css/add_article.css" rel="stylesheet" type="text/css"></link>
	    <script src="../js/jquery-1.3.2.js" type="text/javascript"></script>
	    <script src="../js/modal.js" type="text/javascript"></script>
        <script src="../js/image.js" type="text/javascript"></script>
        <script src="../js/mainMenu_navigation.js" type="text/javascript"></script>
        {block name=head}{/block}
    </head>
    <body bgcolor="#6190c4">
	<div id="header" style="height:100px;">
		<div id="upper_rope">
			<div class="login_home" id="login_home">
				<a id="login_sub_menu" href="#" name="rope_home" class="home">Login</a>
			</div>
		    {if $user_logged ne false}
                <div id="display_name_top">
                    <a href="#">{$display_name}<a>
                </div>
            {/if}
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
			      <li name="home"><a href="#" id="home_link" name="home">Home</a></li>
			      <li name="list_articles"><a href="#" id="view_article_link" name="viewArticle">View articles</a></li>
			      {if $user_logged eq true}
			      <li name="edit_profile"><a href="#" id="edit_profile_link" name="editProfile">Edit profile</a></li>
			      <li name="add_article"><a href="#" id="add_article_link" name="addArticle">Add article</a></li>
                  {if $admin eq true}
                  <li name="view_users"><a href="#" id="view_users_link" name="viewUsers">List of users</a></li>
                  {/if}
			      {/if}
			      <li name="find_article"><a href="#" id="find_article_link" name="findArticle">Find article</a></li>
			</ul>
		</td></tr></table>
	</div>
	<div id="home">
    <div id="most">
		<div id="most_popular">
			<ul>
				<li id="_most"><a href="#">Latest</a></li>
					<ul>
                        {foreach from=$latest item=latest_item}
                            <li><a href="view_article.php?id={$latest_item._id}">{$latest_item.article_title}</a></li>
                        {/foreach}
                    </ul>
			</ul>
            <br></br>
	    </div>
        <br></br>
        <br></br>
	    <div id="most_searched">
		<ul>
			<p><li id="_most"><a href="#">Most liked</a></li>
				<ul>
                    {foreach from=$most_liked item=liked}
                            <li><a href="view_article.php?id={$liked._id}">{$liked.article_title}</a></li>
                    {/foreach}
                </ul></p>
		</ul>
        </div>
        <div id="follow">
            <p><a name="follow" href="#">Follow</a></p>
        </div>
     </div>   
       <div id="myDiv" style="background-color:white;"> 
	    <div id="test"></div>
            <p id="error">{$error_msg}</p>
            {block name=body}{/block}
       </div>
       </div>
       <div id="footer">
            {$footer_msg}
       </div>
    </body>
</html>
