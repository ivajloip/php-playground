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
            AddArticle::addArticle($this, $this->article);
            AddArticle::checkArticle($this, $this->article);
#            $this->viewArticle();
        }

        public static function addArticle($test, $article) {
            $test->click('add_article_link');
            $test->type('article_title', $article['article_title']);
            $test->type('article', $article['article']);
            $test->selectElementWithLabel('province', $article['province']);
            $test->selectElementWithLabel('categories', $article['tags']);
            $test->clickAndWait('submit');        
        }
    
        public static function checkArticle($test, $article) {
            $test->waitForElementWithText('article_title', htmlspecialchars($article['article_title']));
            $test->waitForElementWithText('article', htmlspecialchars($article['article']));
        }
    }
?>
