{extends file="default_form.tpl"}
{block name=form}

            <span class="{$block}">
                {if $username_show ne 'false'}
                    <label class="{$label_class}" for="username">{$login_msg}:</label>
                    <input class="{$input_class}" type="text" 
                    name="username" id="username" value="{$username_value}"/>
                {else}
                    <input class="{$input_class}" type="hidden" 
                        name="username" id="username" value="{$username_value}"/>
                {/if}
            </span>

            <span class="{$block}">
                <label class="{$label_class}" for"password">{$password_msg}:</label>
                <input class="{$input_class}" type="password" name="password" id="password">
            </span>

            {block name=additional_fields}{/block}

            <input class="{$button}" type="submit" name="submit" value="{$submit_msg}" id="submit" />
{/block}
