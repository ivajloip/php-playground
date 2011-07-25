<?php
    require_once('../tests/BaseTest.php');

    class RegisterTest extends BaseTest {

        private $user;

        function __construct($selenium = NULL, $username = NULL) {
            if(NULL == $username) {
                $username = 'test' . time();
            }
            $this->user = array('username' => $username, 'password' => 'qwerty123', 'email' => $username . '@mydomain.com');
            $this->setSelenium($selenium);
        }

        public function testRegister() {
            RegisterTest::register($this, $this->user);
            RegisterTest::checkRegister($this, $this->user);
        }

        public static function register($test, $user) {
            $test->click('login_sub_menu');
            $test->click('register');
            $test->waitForElementVisible('username');
            $test->type('username', $user['username']);
            $test->type('password', $user['password']);
            $test->type('confirm_password', $user['password']);
            $test->type('email', $user['email']);
            $test->clickAndWait('submit');
        }

        public function checkRegister($test, &$user) {
            // we can login
            $test->logout();
            $test->login($user['username'], $user['password']);
            $test->logout();

            // we can not register with the same username or email
            $user['email'] = 'test';
            RegisterTest::register($test, $user);
            require_once('../utils/help.php');
            $messages = getMessages();
            $test->waitForElementWithText('error', $messages['error_dublicating_user_info']);
            $username = $this->user['username'];
            $this->user['email'] = $username . '@mydomain.com';
            $this->user['username'] = $username . '_new';
            RegisterTest::register($test, $user);
            $test->waitForElementWithText('error', $messages['error_dublicating_user_info']);
        }
    }
?>
