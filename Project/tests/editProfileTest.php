<?php
    require_once('../tests/BaseTest.php');
    
    class EditProfileTest extends BaseTest {

        private $user;
        
        function __construct($selenium = NULL) {
            $username = 'test' . time();
            $this->user = array('username' => $username, 'password' => 'qwerty123', 'newPassword' => 'betterone', 'confirm_password' => 'betterone', 'display_name' => 'Alias', 'email' => 'something@email.com', 'avatar' => NULL);
            $this->selenium = $selenium;
        }

        public function testEditProfile() {
            require_once('RegisterTest.php');
            $test = new RegisterTest($this->getSelenium(), $this->user['username']);
            $test->testRegister();

            $this->login($this->user['username'], $this->user['password']);
            $this->editProfile();
            $this->checkProfile();
            $this->logout();
            $this->login($this->user['username'], $this->user['newPassword']);
        }

        function editProfile() {
            $this->click('edit_profile_link');
            $this->type('password',$this->user['newPassword']);
            $this->type('confirm_password',$this->user['confirm_password']);
            $this->type('display_name',$this->user['display_name']);
            $this->check('female');
            $this->type('avatar',$this->user['avatar']);
//            $this->check('moderator');
//            $this->check('admin');
            $this->check('active');
            $this->clickAndWait('submit');
        }

        function checkProfile() {
            $this->click('edit_profile_link');
            $this->waitForElementWithValue('password', '');
            $this->waitForElementWithValue('confirm_password', '');
            $this->waitForElementWithValue('display_name', $this->user['display_name']);
            $this->isChecked('female');
//            $this->waitForCondition("getValue('avatar')==$this->user['avatar']");
//            $this->isChecked('moderator');
//            $this->isChecked('admin');
            $this->isChecked('is_active');
            $this->waitForElementWithText('display_name_top',$this->user['display_name']);
        }
    }
?>
