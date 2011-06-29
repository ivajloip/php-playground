{extends file="base.tpl"}
    {block name=body}
	<div id="modal_window">
		<div id="dialog" class="window">
		       <form id="forgPass_form" action="{$action}" method="post" class="modal_form">
 		            <span class="modal_template">
              			  <label class="label" for"email">{$email_msg}:</label>
            		      	  <input class="input" type="text" name="email" id="email">
			          <br>
				  <input class="button" type="submit" name="submit" value="{$submit_msg}" id="submit" />
      			    </span>
        	      </form>
  		      <form id="modal_form" action="{$action}" method="post" class="modal_form">
 		           {block name=form}Default Body{/block}
        	      </form>
		      <a href="#" class="close">Close</a>
		      <div id="description">Something</div>
		      <a href="#forgPass_form" name="forgotten_password" class="forgPass_link">Forgotten password?</a>
		</div>
		<div id="mask"></div>
	</div>
    {/block}
