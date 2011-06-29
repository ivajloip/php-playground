<?php
    require_once('../tests/BaseTest.php');

    class RegisterTest extends BaseTest {

        private $user;

        function __construct() {
            $username = 'test' . time();
            $this->user = array('username' => $username, 'password' => 'qwerty123', 'email' => $username . '@mydomain.com');
        }

        public function testRegister() {
            $this->register();
            $this->logout();
            $this->login();
            $this->logout();
            $this->checkRegister();
        }

        public function register() {
            $this->open('forms/register_form.php');
            $this->type('username', $this->user['username']);
            $this->type('password', $this->user['password']);
            $this->type('confirm_password', $this->user['password']);
            $this->type('email', $this->user['email']);
            $this->clickAndWait('submit');
        }

        public function logout() {
            $this->open('forms/logout_form.php');
        }

        public function login() {
            $this->open('forms/login_form.php');
            $this->type('username', $this->user['username']);
            $this->type('password', $this->user['password']);
            $this->clickAndWait('submit');
        }

        public function checkRegister() {
            $this->user['email'] = 'test';
            $this->register();
            require_once('../utils/help.php');
            $messages = getMessages();
            $this->waitForElementWithText('error', $messages['error_dublicating_user_info']);
            $username = $this->user['username'];
            $this->user['email'] = $username . '@mydomain.com';
            $this->user['username'] = $username . '_new';
            $this->waitForElementWithText('error', $messages['error_dublicating_user_info']);
        }
    }
?>
