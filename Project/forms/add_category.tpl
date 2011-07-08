{extends file="default_form.tpl"}
        {block name=form}
            <span class="edit_span">
                <label class="label" for="name">{$category_msg}:</label>
                <input class="input" id="name" name="name" type="text"/>
                <br/>
            </span>

           <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
        {/block}
