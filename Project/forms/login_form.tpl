{extends file="default_form.tpl"}
{block name=form}
    <span class="block">
        <label class="label_class" for="username">{$login_msg}:</label>
        <input class="input_class" type="text" name="username" id="username" />
    </span>
    <span class="block">
        <label class="label_class" for"password">{$password_msg}:</label>
        <input class="input_class" type="password" name="password" id="password">
    </span>

    <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
{/block}
