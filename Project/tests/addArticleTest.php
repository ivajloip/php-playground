<?php
    require_once('../tests/BaseTest.php');

    class AddArticle extends BaseTest{
        private $article;
        
        function __construct(){
            $this->article=array('article_title' => '<p>Some article title</p>', 'article' => '<div>Some text</div', 'province' => 'Софийска', 'tags' => "Катерене");
        }
    
        function testAddArticle(){
            $this->login('ivo','test');
            addArticle();
            checkArticle();
        }

        function addArticle(){
            $this->open('forms/home.php');
            $this->click('addArticle');
            $this->type('article_title', $this->article['article_title']);
            $this->type('article', $this->article['article']);
            $this->selectElementWithValue('province', $this->article['province']);
            $this->selectElementWithValue('tags', $this->article['tags']);
            $this->click('submit');        
        }
    
        function checkArticle(){    
            $this->waitForElementWithValue('submitted_article_title', $this->article['article_title']);
            $this->waitForElementWithValue('article.article', $this->article['article']);
        }


    }
?>
