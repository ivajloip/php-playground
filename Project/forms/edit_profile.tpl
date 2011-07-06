{extends file="default_form.tpl"}
            {block name=form}
            <input class="{$input_class}" type="hidden" 
               name="username" id="username" value="{$username_value}"/>

            <span class="edit_span">
                <label class="label" for"password">{$password_msg}:</label>
                <input class="input" type="password" name="password" id="password">
        		<br/>
            </span>

            <span class="edit_span">
                <label class="label" for"confirm_password">{$confirm_password_msg}:</label>
                <input class="input" type="password" name="confirm_password" id="confirm_password">
        		<br/>
            </span>
            
	        <span class="edit_span">
                <label class="edit_email" for"email">{$email_msg}:</label>
                <input class="input" type="text" name="email" 
                    id="email" value="{$email_value}" />
        		<br/>
            </span>

		    <span class="edit_span">
		        <label for="display_name" class="{$label_class}">{$display_name_msg}:</label>
		        <input type="text" name="display_name" value="{$display_name_value}" id="display_name" class="input" />
                <br/>
		    </span>
            
            <span class="edit_span">
		        <label for="male" class="{$label_class}">{$male_msg}</label>
		        <input type="radio" name="sex" value="male" id="male" class="{$input_class}" 
                    {$male_checked} />
		    </span>

		    <span class="edit_span">
		        <label for="female" class="{$label_class}">{$female_msg}</label>
		        <input type="radio" name="sex" value="female" id="female" class="{$input_class}" 
                    {$female_checked} />
                <br/>
		    </span>

		    <span class="edit_span">
                <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}" /> <!-- bytes -->
                <label for="avatar" class="label">{$avatar_msg}</label>
                <input id="avatar" type="file" name="avatar" class="input"/> 
                <br/>
		    </span>

            {if $admin_view eq true}
		    <span class="edit_span">
		        <label for="is_admin" class="{$label_class}">{$is_admin_msg}</label>
		        <input type="checkbox" name="is_admin" value="true" id="is_admin" class="{$input_class}" 
                    {$is_admin_checked} />
                <br/>
		    </span>

		    <span class="edit_span">
		        <label for="is_moderator" class="{$label_class}">{$is_moderator_msg}</label>
		        <input type="checkbox" name="is_moderator" value="true" id="is_moderator" class="{$input_class}" 
                    {$is_moderator_checked} />
                <br/>
		    </span>
            {/if}

		    <span class="edit_span">
		        <label for="is_active" class="{$label_class}">{$is_active_msg}</label>
		        <input type="checkbox" name="is_active" value="true" id="is_active" class="{$input_class}" 
                    {$is_active_checked} />
                <br/>
		    </span>

	        <br/>
            <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
            {/block}
