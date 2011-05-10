<?php

require_once('libs/Smarty.class.php');

/**
* Basic interface that represents a single view (HTML page)
*/
interface IView {

    /**
* Renders and displays the HTML.
* For example - should work like $smarty->display("some.tpl")
* @var <string> $pagaName - the name of the template to display
*/
    public function display($pageName);

    /**
* Assigns a variable to a template placeholder
* @var <string> $varName - the name of the placeholder
* @var $varValue - the value for the placeholder
*/
    public function assignTemplateVariable($varName, $varValue);

    /**
* Sets the page title between <title></title> tags
* @var <string> $title - The page title
*/
    public function setPageTitle($title);

    /**
* Sets the location of the javascript files
* @var <string> $jsFolder - the location to the javascript files
*/
    public function setJavascriptFolder($jsFolder);

    /**
* Adds the following javascript files in the HTML template
* @var <array> $js - array of file names that are located in the $jsFolder
*/
    public function addJavascriptFiles($js /* array */);

    /**
* Sets the location of the CSS files
* @var <string> $cssFolder - the location to the CSS files
*/
    public function setCSSFolder($cssFolder);

    /**
* Adds the following CSS files in the HTML template
* @var <array> $css - array of file names that are located in the $cssFolder
*/
    public function addCSSFiles($css /* array */);
}

class View implements IView {
    private $smarty;
    private $cssFiles;
    private $jsFiles;

    public function __construct() {
        $this->smarty = new Smarty;
        $this->cssFiles = array();
        $this->jsFiles = array();
    }

    public function display($pageName) {
        $this->smarty->assign('jsFiles', $this->jsFiles);
        $this->smarty->assign('cssFiles', $this->cssFiles);
        $this->smarty->display($pageName);
    }

    public function assignTemplateVariable($varName, $varValue) {
        $this->smarty->assign($varName, $varValue);
    }

    public function setPageTitle($title) {
        $this->smarty->assign('title', $title);
    }

    public function setJavascriptFolder($jsFolder) {
        $this->smarty->assign('jsFolder', $jsFolder);
    }

    public function addJavascriptFiles($js /* array */) {
        $this->jsFiles = array_merge($this->jsFiles, $js);
    }

    public function setCSSFolder($cssFolder) {
        $this->smarty->assign('cssFolder', $cssFolder);
    }

    public function addCSSFiles($css /* array */) {
        $this->cssFiles = array_merge($this->cssFiles, $css);
    }
}

?>
