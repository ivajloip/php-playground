$(document).ready(function() {
	function showModalWin(modWindow){
		//getting the document size
		var maskWidth = $(document).width();
		var maskHeight = $(document).height();

 		//getting the window size
		var windowWidth = $(window).width();
		var windowHeight = $(window).height();
		
		//setting the modal window to center
		$(modWindow).css('top',windowHeight/2 - $(modWindow).height()/2);
		$(modWindow).css('left',windowWidth/2 - $(modWindow).width()/2);
		$('#modal_form').css('top',($(modWindow).height())/2 - ($('#modal_form').height())/2);
        $('#forgPass_form').css('top',($(modWindow).height())/2 - ($('#forgPass_form').height())/2);
	//	$('#modal_form').css('left',$(modWindow).height()/2 - $('#modal_form').width()/2);

		$('#mask').fadeIn(1000);
		$('#mask').fadeTo('medium',0.5);
			
		$(modWindow).fadeIn(2000);
	}
	function closeFunc() {
		$('#close').click(function(e) {
		e.preventDefault();
		$('#dialog, .window').hide();
		$('#mask').hide();});
	}
	function descriptionFunc() {
		$('input[name=username]').focus(function() {
            description = document.getElementById('description');
            description.innerHTML = 'Enter username';
			var formWidth=$('#modal_form').width();
			var formHeight=$('#modal_form').height();
			var modalWidth=$('#dialog').width();
			var modalHeight=$('#dialog').height();
			$('#description').css('top',modalHeight/2-(4/9)*formHeight);
			$('#description').css('left',modalWidth/2+formWidth/4);
			$('#description').show();
		});

		$('input[name=password]').focus(function(){
            description = document.getElementById('description');
            description.innerHTML = 'Enter password';
			var formWidth=$('#modal_form').width();
			var formHeight=$('#modal_form').height();
			var modalWidth=$('#dialog').width();
			var modalHeight=$('#dialog').height();
			$('#description').css('top',modalHeight/2-(0.23)*formHeight);
			$('#description').css('left',modalWidth/2+formWidth/4);
			$('#description').show();
		});
	
		$('input[name=confirm_password]').focus(function(){
			$('#description').hide();
		});
		$('input[name=email]').focus(function(){
			$('#description').hide();
		});
	}
	function passFunc(){
		$('a[name=forgotten_password]').click(function(e){
		e.preventDefault();
		var forgPass=$(this).attr('href');
	        $('#modal_form').load('forgottenPass.php #modal_form',function(){
	    	$(forgPass).show();
	    	$('a[name=forgotten_password]').hide();
            closeFunc()}); 
		
	});
	}
	$('a[name=rope_home]').click(function(){
		if(!$('#sub_login_div').is(":visible")) {
			$('#sub_login_div').show();
			$('#login_home').css('border-color','#82d23d');
			$('a[name=modal_login]').click(function(e) {
		
				e.preventDefault();
				var dialog=$(this).attr('href');
				//ajax behavior
				$('#test').load('login_form.php #modal_window',function(){
				$(dialog).css('height','170px');
				$(dialog).css('width','250px');

				$('#modal_form').css('height','170px');
				$('#modal_form').css('width','250px');
		
				showModalWin(dialog);
				closeFunc();
				passFunc();});
			});

			$('a[name=modal_register]').click(function(e) {
				e.preventDefault();
				var dialog=$(this).attr('href');
				$('#test').load('register_form.php #modal_window',function(){

				$(dialog).css('height','300px');
				$(dialog).css('width','600px');
				$('#modal_form').css('height','200px');
                $('#modal_form').css('margin-top','10.1%');
				$('#modal_form').css('width','400px');
				$('#modal_form').css('float','left');
				$('a[name=forgotten_password]').hide(); 
                $('#forgPass_form').hide(); 
		
				showModalWin(dialog);
				closeFunc();
				descriptionFunc();});
			});			
		}
		else {
			$('#sub_login_div').hide();
			$('#login_home').css('border-color','black');
		}
	});
});


