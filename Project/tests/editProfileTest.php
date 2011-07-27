<?php
    require_once('../tests/BaseTest.php');
    
    class EditProfileTest extends BaseTest {

        private $user;
        
        function __construct($selenium = NULL) {
            $username = 'test' . time();
            $this->user = array('username' => $username, 'password' => 'qwerty123', 'newPassword' => 'betterone', 'confirm_password' => 'betterone', 'display_name' => 'Alias', 'email' => $username . '@mydomain.com', 'avatar' => NULL);
            $this->selenium = $selenium;
        }

        public function testEditProfile() {
            require_once('RegisterTest.php');
            RegisterTest::register($this, $this->user);
            EditProfileTest::editProfile($this, $this->user);
            EditProfileTest::checkProfile($this, $this->user);
            $this->logout();
            $this->login($this->user['username'], $this->user['newPassword']);
        }

        public static function editProfile($test, $user) {
            $test->type('password', $user['newPassword']);
            $test->type('confirm_password', $user['confirm_password']);
            $test->type('display_name', $user['display_name']);
            $test->check('female');
            $test->type('avatar', $user['avatar']);
//            $test->check('moderator');
//            $test->check('admin');
            $test->check('is_active');
            $test->clickAndWait('submit');
        }

        public static function checkProfile($test, $user) {
            $test->click('edit_profile_link');
            $test->waitForElementWithValue('password', '');
            $test->waitForElementWithValue('confirm_password', '');
            $test->waitForElementWithValue('display_name', $user['display_name']);
            $test->isChecked('female');
//            $test->isChecked('moderator');
//            $test->isChecked('admin');
            $test->isChecked('is_active');
            $test->waitForElementWithText('display_name_top',$user['display_name']);
        }
    }
?>
