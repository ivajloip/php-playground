{extends file="base.tpl"}

    {block name=body}
           <span class="{$block}">
                <img src="data:{$mime_type};base64,{$content}" 
                    alt="{$avatar_msg}" align="left" class="avatar"/>
            </span>
    {/block}
