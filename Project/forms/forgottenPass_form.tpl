{extends file="default_form.tpl"}
{block name=modalform}
                <span class="modal_template">
                    <label class="label" for"email">{$email_msg}:</label>
                    <input class="input" type="text" name="email" id="email"/>
                    <br>
                    <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit_" />
                </span>
{/block}

