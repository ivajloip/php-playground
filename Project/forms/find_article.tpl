{extends file="default_form.tpl"}
        {block name=form}
            <span class="{$block}">
                <label class="label" for"text_contained_in_title">{$text_contained_in_title_msg}:</label>
                <input class="input" type="text" name="text_contained_in_title" id="text_contained_in_title">
        		<br/>
            </span>

            <span class="{$block}">
                <label class="label" for"text_contained_in_body">{$text_contained_in_body_msg}:</label>
                <input class="input" type="text" name="text_contained_in_body" id="text_contained_in_body">
        		<br/>
            </span>
            
            <span class="{$block}">
                <label class="label" for"publisher">{$publisher_msg}:</label>
                <input class="input" type="text" name="publisher" id="publisher">
        		<br/>
            </span>

            <!-- time interval -->
            <span class="{$block}">
                <label class="label" for"after_date">{$after_date_msg}:</label>
                <input class="input" type="text" name="after_date" id="after_date">
                <label class="label" for"before_date">{$before_date_msg}:</label>
                <input class="input" type="text" name="before_date" id="before_date">
        		<br/>
            </span>

            <!-- province select -->
            <span class="{$block}">
                <label class="{$article_provinces_label_class}" for="provinces">{$article_provinces_msg}:</label>
                <select id="provinces" name="provinces[]" class="{$article_province_class}" multiple="yes">
                    <option value="">{$empty_value_msg}</option>
                {foreach from=$provinces item=province}
                {strip}
                    <option value="{$province._id}">{$province.name}</option>
                {/strip}
                {/foreach}
                </select>
                <br/>
            </span>
            
            <!-- activity categories select -->
            <span class="{$block}">
                <label class="{$article_categories_label_class}" 
                    for="categories">
                    {$article_categories_msg}:
                </label>
                <select id="categories" name="categories[]" 
                    class="{$article_categories_class}" multiple="yes">
                {foreach from=$categories item=category}
                {strip}
                    <option value="{$category._id}">{$category.name}</option>
                {/strip}
                {/foreach}
                </select>
                <br/>
            </span>

            <span class="{$block}">
		        <label for="sort_by_date" class="{$label_class}">
                    {$sort_by_date_msg}
                </label>
		        <input type="radio" name="sort_order" value="sort_by_date" 
                    id="sort_by_date" class="{$input_class}" checked="true" />
                <br/>
		        <label for="sort_by_likes" class="{$label_class}">
                    {$sort_by_likes_msg}
                </label>
		        <input type="radio" name="sort_order" value="sort_by_likes" 
                    id="sort_by_likes" class="{$input_class}" />
                <br/>
		    </span>


            <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
        {/block}
