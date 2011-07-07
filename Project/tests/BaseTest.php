<?php

set_include_path(get_include_path() . PATH_SEPARATOR . './PEAR/');
require_once 'Testing/Selenium.php';
require_once('Testing/Selenium/Exception.php');
require_once 'PHPUnit/Framework/TestCase.php';

class BaseTest extends PHPUnit_Framework_TestCase
{
    private $selenium;
    const timeout = 10000;

    public function __construct($selenium = NULL) {
        $this->selenium = $selenium;
    }

    public function setUp()
    {
        $this->selenium = new Testing_Selenium("*firefox", "http://localhost/Project");
        $this->selenium->start();
        $this->open('forms/home.php');
    }

    public function tearDown()
    {
        $this->selenium->stop();
    }

    public function login($username, $password) {
        $this->click('login_sub_menu');
        $this->click('login');
        $this->waitForElementVisible('username');
        $this->type('username', $username);
        $this->type('password', $password);
        $this->clickAndWait('submit');
    }

    public function logout() {
            $this->click('login_sub_menu');
            $this->clickAndWait('login');
    }

    public function waitForElementPresent($id) {
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" .
                        $id . "') != null";
        $this->waitForCondition($condition);
    }

    public function waitForElementNotPresent($id) {
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" .
                        $id . "') == null";
        $this->waitForCondition($condition);
    }

    public function click($id) {
        $this->waitForElementPresent($id);
        $this->selenium->click($id);
    }

    public function clickAndWait($id) {
        $this->click($id);
        $this->selenium->waitForPageToLoad(self::timeout);
    }

    public function type($id, $text) {
        $this->waitForElementPresent($id);
        $this->selenium->type($id, $text);
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').disabled == false";
        $this->waitForCondition($condition);
    }

    public function open($relativeUrl) {
        $this->selenium->open($relativeUrl);
    }

    public function isElementPresent($id) {
        return $this->selenium->isElementPresent($id);
    }

    public function isTextPresent($text) {
        return $this->selenium->isTextPresent($text);
    }

    public function getValue($id) {
        return $this->selenium->getValue($id);
    }

    public function getText($id) {
        return $this->selenium->getText($id);
    }

    public function check($id) {
        $this->selenium->check($id);
    }
    
    public function unchecked($id) {
        $this->selenium->uncheck($id);
    }

    function isChecked($id) {
        return $this->selenium->isChecked($id);
    }

    function isSelected($id) {
        return $this->selenium->isSelected($id);
    }

    public function waitForEnabledElement($id) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').disabled == false";
        $this->waitForCondition($condition);
    }

    public function waitForDisabledElement($id) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').disabled == true";
        $this->waitForCondition($condition);
    }

    public function waitForElementWithText($id, $text) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').innerHTML.indexOf('" . $text . "') >= 0";
        $this->waitForCondition($condition);
    }

    public function waitForElementWithValue($id, $value) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').value.indexOf('" . $value . "') >= 0";
        $this->waitForCondition($condition);
    }

    public function waitForElementVisible($id) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "') && " . "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').style.display != 'none'";
        $this->waitForCondition($condition);
    }

    public function waitForElementNotVisible($id) {
        $this->waitForElementPresent($id);
        $condition = "selenium.browserbot.getCurrentWindow().document.getElementById('" 
                        . $id . "').style.display == 'none'";
        $this->waitForCondition($condition);
    }

    public function selectElementWithLabel($id, $label) {
        $this->waitForElementPresent($id);
        $this->selenium->select($id, "label=" . $label);
    }

    public function selectElementWithValue($id, $value) {
        $this->waitForElementPresent($id);
        $this->selenium->select($id, "value=" . $value);
    }

    public function getTableRowCount($id) {
        $this->waitForElementPresent($id);
        return $this->selenium.getXpathCount("//table[@id='" . $id . "']/tr");
    }

    protected function waitForCondition($condition) {
        $this->assertTrue($this->selenium->waitForCondition($condition, self::timeout));
    }

    protected function getSelenium() {
        return $this->selenium;
    }

    protected function setSelenium($selenium) {
        $this->selenium = $selenium;
    }

}
?>
