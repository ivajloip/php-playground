{extends file="default_form.tpl"}
{block name=modalform}
                <span class="modal_template">
                    <label class="modal_label" for"email">{$email_msg}:</label>
                    <input class="modal_input" type="text" name="email" id="email"/>
                    <br>
                    <input class="modal_button" type="submit" name="submit" value="{$submit_msg}" id="submit_" />
                </span>
                <br>
                <span class="modal_span">
                    <a href="#" class="close" id="close">Close</a>
                </span>
{/block}

