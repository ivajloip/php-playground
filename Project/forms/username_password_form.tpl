{extends file="default_form.tpl"}
{block name=form}
            <span class="{$block}">
                <label class="label" for="username">{$login_msg}:</label>
                <input class="input" type="text" name="username" id="username" />
		<br>
            </span>
            <span class="{$block}">
                <label class="label" for"password">{$password_msg}:</label>
                <input class="input" type="password" name="password" id="password">
		<br>
            </span>

            {block name=additional_fields}{/block}
	    <br><br>
            <input class="{$button}" type="submit" name="submit" value="{$submit_msg}" id="submit" />
{/block}
