$(document).ready(function(){
	$('input[name=username]').focus(function(){
		var formWidth=$('#modal_form').width();
		var formHeight=$('#modal_form').height();
		var modalWidth=$('#dialog').width();
		var modalHeight=$('#dialog').height();
		$('#description').css('top',modalHeight/2-(1/2)*formHeight);
		$('#description').css('left',modalWidth/2);
		$('#description').show();
	});

	$('input[name=password]').focus(function(){
		var formWidth=$('#modal_form').width();
		var formHeight=$('#modal_form').height();
		var modalWidth=$('#dialog').width();
		var modalHeight=$('#dialog').height();
		$('#description').css('top',modalHeight/2-(3/10)*modalHeight+(1/4)*formHeight);
		$('#description').css('left',modalWidth/2);
		$('#description').show();
	});
	
	$('input[name=confirm_password]').focus(function(){
		$('#description').hide();
	});
	$('input[name=email]').focus(function(){
		$('#description').hide();
	});
});
