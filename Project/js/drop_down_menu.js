$(document).ready(function(){
	$('a[name=home]').hover(function(){	
		$('#sub').slideDown(500);
	});
	$('#login_home').mouseleave(function(){	
		$('#sub').slideUp();
		});
});
