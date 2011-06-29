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
	//	$('#modal_form').css('left',$(modWindow).height()/2 - $('#modal_form').width()/2);

		$('#mask').fadeIn(1000);
		$('#mask').fadeTo('medium',0.5);
			
		$(modWindow).fadeIn(2000);
	}
	function closeFunc(){
		$('.window .close').click(function(e) {
		e.preventDefault();
		$('#dialog, .window').hide();
		$('#mask').hide();});
	}
	function passFunc(){
		$('a[name=forgotten_password]').click(function(e){
		e.preventDefault();
		var forgPass=$(this).attr('href');
		$('#modal_form').hide();
		$(forgPass).show();
		$('a[name=forgotten_password]').hide(); 
		
	});
	}
	$('a[name=modal_login]').click(function(e) {
		
		e.preventDefault();
		var dialog=$(this).attr('href');
		//ajax behavior
		$('#myDiv').load('login_form.php #modal_window',function(){
		$(dialog).css('height','170px');
		$(dialog).css('width','250px');

		$('#modal_form').css('height','100px');
		$('#modal_form').css('width','100px');
		
		showModalWin(dialog);
		closeFunc();
		passFunc();});
	});

	$('a[name=modal_register]').click(function(e) {
		e.preventDefault();
		var dialog=$(this).attr('href');
		$('#myDiv').load('register_form.php #modal_window',function(){

		$(dialog).css('height','300px');
		$(dialog).css('width','500px');
		$('#modal_form').css('height','200px');
		$('#modal_form').css('width','200px');
		$('#modal_form').css('float','left');
		$('a[name=forgotten_password]').hide(); 
		
		showModalWin(dialog);
		closeFunc();});
	});
});


