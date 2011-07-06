<?php
	require_once('../utils/help.php');

	function followUserOnSubmit(){
		require_once('../utils/db.php');
        	$db = connect();
		//$users = $db->users;
		$userToFollow=findUserByUsername($_POST['username']);
		if ($userToFollow)
			followUser($userToFollow['_id'], $_SESSION['id']);
		else {
			$messages = getMessages();
			displayUserToFollowForm($messages['error_no_such_user']);
		}
	}
	
	function displayUserToFollowForm($error = NULL){
		$vars = getMessagesForArray(array('username', 'submit'));
		$vars += array('action' => '../forms/followUser.php',
				'error_msg' => $error); 
		genericSmartyDisplay($vars,"../forms/followUser_form.tpl");
	}
	genericRequestHandler(followUserOnSubmit, displayUserToFollowForm, redirect2Home);
?>
