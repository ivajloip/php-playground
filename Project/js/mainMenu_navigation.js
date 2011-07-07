$(document).ready(function(){

	$('a[name=editProfile]').click(function(){
		$("#myDiv").load("edit_profile.php #content");
   	});
	
	$('a[name=addArticle]').click(function(){
		$("#myDiv").load("add_article.php #content");
	});
	
	$('a[name=viewArticle]').click(function(){
		$("#myDiv").load("list_articles.php #myDiv");
	});
	
	$('a[name=home]').click(function(){
		$("#myDiv").load("home.php #myDiv");
	});

    $('a[name=viewUsers]').click(function(){
		$("#myDiv").load("list_users.php #myDiv");
	});
    
    $('a[name=findArticle]').click(function(){
		$("#myDiv").load("find_article.php #myDiv");
	});
    
    $('a[name=follow]').click(function(){
		$("#myDiv").load("followUser.php #myDiv");
	});
	
});
