<?php
        require_once('../utils/help.php');
	
	function generateNewPass($alphabet, $length)
	{
		for ($i=0; $i<$length; $i++)
		{		
			$num=rand(0,count($alphabet)-1);
			$result.=$alphabet[$num];
		}
		return $result;
	}

	function forgottenPassOnSubmit() {
		require_once('../utils/db.php');
		$db = connect();
		$users = $db->users;
		$alphabet=array("a","b","4","#","g","$","*","@","&","^","4","5","%");
		$newPass=generateNewPass($alphabet,10);
		$user=findUserByEmail($_POST['email']);
		$newPassHash=generateHash($newPass, $user['username']);
		//change password in data base 
		var_dump($user);
		$users->update(array('_id' => $user['_id']), array('$set' => array('password' => $newPassHash)));
		sendNewPasswdMail($_POST['email'], $newPass);
		redirect2Home();
        }

	function displayForgPassForm(){
		$vars = getMessagesForArray(array('email', 'submit'));
		$vars += array('action' => '../forms/forgottenPass.php'); 
		genericSmartyDisplay($vars,"../forms/forgottenPass_form.tpl");
	}

	genericRequestHandler(forgottenPassOnSubmit, redirect2Home, displayForgPassForm);
?>	
