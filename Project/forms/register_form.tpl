{extends file="username_password_form.tpl"}
        {block name=additional_fields}
            <span class="modal_template">
                <label class="label" for"confirm_password">{$confirm_password_msg}:</label>
                <input class="input" type="password" name="confirm_password" id="confirm_password">
		<br>
            </span>
            <span class="modal_template">
                <label class="label" for"email">{$email_msg}:</label>
                <input class="input" type="text" name="email" id="email">
		<br>
            </span>
        {/block}
