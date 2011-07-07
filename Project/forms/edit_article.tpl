{extends file="add_article.tpl"}
        {block name=additional_fields}
            <span class="{$block}">
		        <label for="is_active" class="{$label_class}">{$is_active_msg}</label>
		        <input type="checkbox" name="is_active" value="true" id="is_active" class="{$input_class}" 
                    {$is_active_checked} />
                <br/>
		    </span>
        {/block}
