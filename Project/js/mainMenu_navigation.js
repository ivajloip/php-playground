$(document).ready(function(){
	/*function navigation(page){
		$("#myDiv").load(page "#content",function(){
			
		});)
	} */
	
	$('a[name=editProfile]').click(function(){
		$("#myDiv").load("edit_profile.php #content");
	});
	
	$('a[name=addArticle]').click(function(){
		$("#myDiv").load("add_article.php #content"/*,function(){
			var session = "<?php= isset($_SESSION['id'])?>";
			if (session != 1)
			{				
				showModalWin('#dialog');
				closeFunc();
				passFunc();
			}
				
		}*/);
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
	
});
