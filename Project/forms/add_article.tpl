{extends file="default_form.tpl"}
        {block name=form}
            <input type="hidden" id="id" name="id" value="{$id}" />
            <span class="{$block}">
                <label class="{$article_title_label_class}" for="article_title">{$article_title_msg}:</label>
                <input class="{$article_title_class}" id="article_title" name="article_title" type="text" value="{$article_title}"/>
                <br/>
            </span>

            <span class="{$block}">
                <label class="{$article_label_class}" for="article">{$article_label_msg}:</label>
                <textarea class="{$article_text_class}" id="article" name="article" cols="50" rows="6">{$article}</textarea>
                <br/>
            </span>

            <!-- province select -->
            <span class="{$block}">
                <label class="{$article_province_label_class}" for="province">{$article_province_msg}:</label>
                <select id="province" name="province" class="{$article_province_class}">
                    <option value="">{$empty_value_msg}</option>
                {foreach from=$provinces item=province}
                {strip}
                    <option value="{$province._id}" {$province.selected}>{$province.name}</option>
                {/strip}
                {/foreach}
                </select>
            </span>
            
            <!-- activity categories select -->
            <span class="{$block}">
                <label class="{$article_categories_label_class}" for="categories">{$article_categories_msg}:</label>
                <select id="categories" name="categories[]" class="{$article_categories_class}" multiple="yes">
                {foreach from=$categories item=category}
                {strip}
                    <option value="{$category._id}" {$category.selected}>{$category.name}</option>
                {/strip}
                {/foreach}
                </select>
            </span>


            <input class="{$button}" type="submit" name="submit" value="{$submit_msg}" id="submit" />
        {/block}
