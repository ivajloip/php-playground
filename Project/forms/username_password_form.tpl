{extends file="default_form.tpl"}
{block name=modalform}
            <span class="modal_span">
                {if $username_show ne 'false'}
                    <label class="modal_label" for="username">{$login_msg}:</label>
                    <input class="modal_input" type="text" 
                        name="username" id="username" value="{$username_value}"/>
		            <br/>
                {else}
                    <input class="modal_input" type="hidden" 
                        name="username" id="username" value="{$username_value}"/>
                {/if}
            </span>

            <span class="{$block}">
                <label class="modal_label" for"password">{$password_msg}:</label>
                <input class="modal_input" type="password" name="password" id="password">
		<br>
            </span>

            {block name=additional_fields}{/block}
            <input class="modal_button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
            <br><br>
            <span class="modal_span">
                <a href="#forgPass_form" name="forgotten_password" class="forgPass_link">Forgotten password?</a>
                <a href="#" class="close" id="close">Close</a>
            </span>
{/block}
