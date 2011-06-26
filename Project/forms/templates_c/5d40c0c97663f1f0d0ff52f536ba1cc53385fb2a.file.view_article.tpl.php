<?php /* Smarty version Smarty-3.0.7, created on 2011-06-21 13:10:47
         compiled from "../forms/view_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1219510384e0098579b0e35-50708342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d40c0c97663f1f0d0ff52f536ba1cc53385fb2a' => 
    array (
      0 => '../forms/view_article.tpl',
      1 => 1308661841,
      2 => 'file',
    ),
    '65f25076139b39828eca9453485f43c28a62035e' => 
    array (
      0 => 'base.tpl',
      1 => 1308342351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1219510384e0098579b0e35-50708342',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php echo $_smarty_tpl->getVariable('title_msg')->value;?>
</title>
    </head>
    <body>
        
        <div>
            <h1>
                <span class="<?php echo $_smarty_tpl->getVariable('article_title_class')->value;?>
">
                    <?php echo $_smarty_tpl->getVariable('article')->value['article_title'];?>

                </span>
            </h1>
        </div>
        <div>
            <pre class="<?php echo $_smarty_tpl->getVariable('article_class')->value;?>
"><?php echo $_smarty_tpl->getVariable('article')->value['article'];?>
</pre>
        </div>

        <div>
            <?php echo $_smarty_tpl->getVariable('liked_msg')->value;?>
: <?php echo $_smarty_tpl->getVariable('article')->value['liked_count'];?>
 <?php echo $_smarty_tpl->getVariable('disliked_msg')->value;?>
: <?php echo $_smarty_tpl->getVariable('article')->value['disliked_count'];?>

        </div>

        <div id="like_dislike_buttons">
            <form id="like_form" action="like.php" method="post">
                <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('article')->value['_id'];?>
" name="articleId"/>
                <input type="hidden" value="article" name="type"/>
                <input type="submit" value="<?php echo $_smarty_tpl->getVariable('liked_msg')->value;?>
" name="like">
                <input type="submit" value="<?php echo $_smarty_tpl->getVariable('disliked_msg')->value;?>
" name="dislike">
            </form>
        </div>


        <div>
            <form id="<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
" action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" method="post" class="<?php echo $_smarty_tpl->getVariable('form_class')->value;?>
">
                <span class="<?php echo $_smarty_tpl->getVariable('block')->value;?>
">
                   <label class="<?php echo $_smarty_tpl->getVariable('comment_label_class')->value;?>
" for"comment"><?php echo $_smarty_tpl->getVariable('comment_label_msg')->value;?>
:</label>
                   <textarea class="<?php echo $_smarty_tpl->getVariable('comment_text_class')->value;?>
" id="comment" name="comment" cols="40" rows="5" ></textarea>
                </span>
                <input class="<?php echo $_smarty_tpl->getVariable('button')->value;?>
" type="submit" name="submit" value="<?php echo $_smarty_tpl->getVariable('submit_msg')->value;?>
" id="submit" />
            </form>
        </div>


        <table class="<?php echo $_smarty_tpl->getVariable('table_class')->value;?>
">
            <tr class="<?php echo $_smarty_tpl->getVariable('tr_header_class')->value;?>
">
                <th class="<?php echo $_smarty_tpl->getVariable('th_class')->value;?>
">
                    <?php echo $_smarty_tpl->getVariable('table_header_msg')->value;?>

                </th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('article')->value['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
            <tr class="<?php echo $_smarty_tpl->getVariable('tr_class')->value;?>
"><td class="<?php echo $_smarty_tpl->getVariable('td_class')->value;?>
"><div class="<?php echo $_smarty_tpl->getVariable('comment_content')->value;?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
</div><div class="<?php echo $_smarty_tpl->getVariable('comment_info')->value;?>
"><?php echo $_smarty_tpl->getVariable('author_msg')->value;?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['publisher_name'];?>
<?php echo $_smarty_tpl->getVariable('published_date_mgs')->value;?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['published_date'];?>
<?php echo $_smarty_tpl->getVariable('liked_msg')->value;?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['liked_count'];?>
<?php echo $_smarty_tpl->getVariable('disliked_msg')->value;?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['disliked_count'];?>
<form id="like_form" action="like.php" method="post"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['_id'];?>
" name="commentId"/><input type="hidden" value="<?php echo $_smarty_tpl->getVariable('article')->value['_id'];?>
" name="articleId"/><input type="hidden" value="comment" name="type"/><input type="submit" value="<?php echo $_smarty_tpl->getVariable('liked_msg')->value;?>
" name="like"><input type="submit" value="<?php echo $_smarty_tpl->getVariable('disliked_msg')->value;?>
" name="dislike"></form></div></td></tr>
            <?php }} ?>
        </table>
    
    </body>
</html>
