{extends file="base.tpl"}
    {block name=body}
        <div>
            <h1>
                <span class="{$article_title_class}">
                    {$article.article_title}
                </span>
            </h1>
        </div>
        <div>
            <pre class="{$article_class}">{$article.article}</pre>
        </div>

        <div>
            {$liked_msg}: {$article.liked_count} {$disliked_msg}: {$article.disliked_count}
        </div>

        <div>
            <form id="{$form_id}" action="{$action}" method="post" class="{$form_class}">
                <span class="{$block}">
                   <label class="{$comment_label_class}" for"comment">{$comment_label_msg}:</label>
                   <textarea class="{$comment_text_class}" id="comment" name="comment" cols="40" rows="5" ></textarea>
                </span>
                <input class="{$button}" type="submit" name="submit" value="{$submit_msg}" id="submit" />
            </form>
        </div>


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
                    <div class="{$comment_content}">
                        {$comment.comment}
                    </div>
                    <div class="{$comment_info}">
                        {$comment.publisher_name} {$comment.published_date} {$comment.liked_count} {$comment.disliked_count}
                    </div>
                </td>
            </tr>
            {/strip}
            {/foreach}
        </table>
    {/block}

