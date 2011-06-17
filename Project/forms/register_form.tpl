{extends file="username_password_form.tpl"}
        {block name=additional_fields}
            <span class="{$block}">
                <label class="{$label_class}" for"confirm_password">{$confirm_password_msg}:</label>
                <input class="{$input_class}" type="password" name="confirm_password" id="confirm_password">
            </span>
            <span class="{$block}">
                <label class="{$label_class}" for"email">{$email_msg}:</label>
                <input class="{$input_class}" type="text" name="email" id="email">
            </span>
        {/block}
