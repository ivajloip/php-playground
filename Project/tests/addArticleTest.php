<?php
    require_once('../tests/BaseTest.php');

    class AddArticle extends BaseTest {
        private $article;
        
        function __construct($selenium = NULL) {
            $this->article=array('article_title' => '<p>Some article title</p>', 'article' => '<div>Some text</div>', 'province' => 'Софийска', 'tags' => "Катерене");
            $this->selenium = $selenium;
        }
    
        public function testAddArticle() {
            $this->login('ivo','test');
            $this->addArticle();
            $this->checkArticle();
#            $this->viewArticle();
        }

        private function addArticle() {
            $this->click('add_article_link');
            $this->type('article_title', $this->article['article_title']);
            $this->type('article', $this->article['article']);
            $this->selectElementWithLabel('province', $this->article['province']);
            $this->selectElementWithLabel('categories', $this->article['tags']);
            $this->clickAndWait('submit');        
        }
    
        private function checkArticle() {
            $this->waitForElementWithText('article_title', htmlspecialchars($this->article['article_title']));
            $this->waitForElementWithText('article', htmlspecialchars($this->article['article']));
        }
    }
?>
