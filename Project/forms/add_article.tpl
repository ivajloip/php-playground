{extends file="default_form.tpl"}
        {block name=form}
            <input type="hidden" id="id" name="id" value="{$id}" />
            <span class="edit_span">
                <label class="label" for="article_title">{$article_title_msg}:</label>
                <input class="input" id="article_title" name="article_title" type="text" value="{$article_title}"/>
                <br/>
            </span>

            <span class="edit_span">
                <label class="label" for="article">{$article_label_msg}:</label>
                <textarea class="input" id="article" name="article" cols="50" rows="6">{$article}</textarea>
                <br/>
            </span>
            
            <!-- province select -->
            <span class="edit_span">
                <label class="label" for="province">{$article_province_msg}:</label>
                <select id="province" name="province" class="input">
                    <option value="">{$empty_value_msg}</option>
                {foreach from=$provinces item=province}
                {strip}
                    <option value="{$province._id}" {$province.selected}>{$province.name}</option>
                {/strip}
                {/foreach}
                </select>
            </span>
            <br>
            <!-- activity categories select -->
            <span class="edit_span">
                <label class="label" for="categories">{$article_categories_msg}:</label>
                <select id="categories" name="categories[]" class="input" multiple="yes">
                {foreach from=$categories item=category}
                {strip}
                    <option value="{$category._id}" {$category.selected}>{$category.name}</option>
                {/strip}
                {/foreach}
                </select>
            </span>

            {block name=additional_fields}{/block}
            <br>
            <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
        {/block}
