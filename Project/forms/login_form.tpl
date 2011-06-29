{extends file="default_form.tpl"}
{block name=form}
    <span class="login_form">
      <label class="label_class" for="username">{$login_msg}:</label>
      <input class="input_class" type="text" name="login_username" id="username" />
    </span>
    <br>
    <span class="login_form">
       <label class="label_class" for="password">{$password_msg}:</label>
       <input class="input_class" type="password" name="login_password" id="password">
    </span>
    <br>
    <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
{/block}
{block name=forgotten_form}
      <span class="modal_template">
                <label class="label" for="email">{$email_msg}:</label>
             	<input class="input" type="text" name="email" id="email">
		<br>
      </span>
{/block}
