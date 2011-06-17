{extends file="default_form.tpl"}
        {block name=form}
            <span class="{$block}">
                <label class="{$article_label_class}" for"article">{$article_label_msg}:</label>
                <textarea class="{$article_text_class}" id="article" name="article" cols="50" rows="6" ></textarea>
            </span>
            
            <input class="{$button}" type="submit" name="submit" value="{$submit_msg}" id="submit" />
        {/block}
