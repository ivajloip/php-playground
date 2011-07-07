<?php
    require_once('../tests/BaseTest.php');
    
    class EditProfileTest extends BaseTest{

        private $user;
        
        function __construct(){
            $this->user = array('username' => 'isi', 'password' => 'newpass', 'newPassword' => 'betterone', 'confirm_password' => 'betterone', 'display_name' => 'Alias', 'email' => 'something@email.com', 'avatar' => NULL);
        }

        function testEditProfile(){
            $this->login($this->user['username'], $this->user['password']);
            editProfile();
            checkProfile();
        }

        function editProfile(){
            $this->open('forms/home.php');
            $this->click('editProfile');
            $this->type('password',$this->user['password']);
            $this->type('confirm_password',$this->user['confirm_password']);
            $this->type('display_name',$this->user['display_name']);
            $this->select('female');
            $this->type('avatar',$this->user['avatar']);
            $this->check('moderator');
            $this->check('admin');
            $this->check('active');
            $this->click('submit');      
        }

        function checkProfile(){
             $this->click('edit_profile');
             $this->waitForCondition("getValue('password')==NULL");
             $this->waitForCondition("getValue('confirm_password')==NULL");
             $this->waitForCondition("getValue('display_name')==$this->user['display_name']");
             $this->isSelected('female');
//             $this->isNotSelected('male');
             $this->waitForCondition("getValue('avatar')==$this->user['avatar']");
             $this->isChecked('moderator');
             $this->isChecked('admin');
             $this->isChecked('active');
            
        }
    }
?>
