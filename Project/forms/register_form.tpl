{extends file="username_password_form.tpl"}
        {block name=additional_fields}
            <span class="modal_template">
                <label class="label" for"confirm_password">{$confirm_password_msg}:</label>
                <input class="input" type="password" name="confirm_password" id="confirm_password">
		<br/>
            </span>
            
	    <span class="{$block}">
                <label class="{$label_class}" for"email">{$email_msg}:</label>
                <input class="{$input_class}" type="text" name="email" 
                    id="email" value="{$email_value}" />
		<br/>
            </span>

            {block name=user_info}{/block}
        {/block}
