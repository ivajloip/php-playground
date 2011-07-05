{extends file="default_form.tpl"}
	{block name=form}
		<span class="">
                    <label class="label" for"username">{$username_msg}:</label>
                    <input class="input" type="text" name="username" id="username"/>
                    <br>
                    <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit_" />
                </span>
	{/block}
