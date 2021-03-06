{extends file="base.tpl"}
    {block name=body}
        <div id="submitted_article_title">
            <h1>
                <span id="article_title" class="{$article_title_class}">
                    {$article.article_title}
                </span>
            </h1>
        </div>
        <div id="article" class="preformated_text">{$article.article}</div>
        <br>
        <div id="article_details">
           <span class="{$block}">
                <img src="data:{$mime_type};base64,{$content}" 
                    alt="{$avatar_msg}" align="left" class="avatar"/>
            </span>

            {$article_province_msg}: {$article.province}
            {$author_msg} {$article.publisher_name} 
            {$published_date_msg} {$article.published_date->sec|date_format:"h:i:s M d, Y"}
            {$liked_msg}: {$article.liked_count} {$disliked_msg}: {$article.disliked_count}
        </div>

        <div id="like_dislike_buttons">
            <form id="like_form" action="like.php" method="post">
                <input type="hidden" value="{$article._id}" name="articleId"/>
                <input type="hidden" value="article" name="type"/>
                <input class="like" type="submit" value="{$liked_msg}" name="like" />
                <input class="dislike" type="submit" value="{$disliked_msg}" name="dislike" />
                <input class="follow" type="submit" value="{$follow_msg}" name="follow" />
            </form>
        </div>
        <br>
        {if $moderator == true}
        <div id="edit">
            <a href="edit_article.php?id={$article._id}">Edit</a>
        </div>
        {/if}

        <br><br>
        <div id="comment_section">
            <form id="{$form_id}" action="{$action}" method="post" class="{$form_class}">
                <span class="">
                   <label class="_label" for"comment">{$comment_label_msg}:</label><br>
                   <textarea class="" id="comment" name="comment" cols="40" rows="5" ></textarea>
                </span>
                <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
            </form>
        </div>
<!-- comments -->
        <table class="{$table_class}">
            <tr class="{$tr_header_class}">
                <th class="{$th_class}">
                    {$table_header_msg}
                </th>
            </tr>
            {foreach from=$article.comments item=comment}
            {strip}
            <tr class="{$tr_class}">
                <td class="{$td_class}">
                    <div class="preformated_text">{$comment.comment}</div>
                    <div class="{$comment_info}">
                        {$author_msg} {$comment.publisher_name} 
                        {$published_date_msg} {$comment.published_date->sec|date_format:"h:i:s M d, Y"}
                        {$liked_msg} {$comment.liked_count} 
                        {$disliked_msg} {$comment.disliked_count}
                        <form id="like_form" action="like.php" method="post">
                            <input type="hidden" value="{$comment._id}" name="commentId"/>
                            <input type="hidden" value="{$article._id}" name="articleId"/>
                            <input type="hidden" value="comment" name="type"/>
                            <input class="like" type="submit" value="{$liked_msg}" name="like" />
                            <input class="dislike" type="submit" value="{$disliked_msg}" name="dislike" />
                        </form>
                    </div>
                </td>
            </tr>
            {/strip}
            {/foreach}
        </table>
<!-- end of comments -->

    {/block}

