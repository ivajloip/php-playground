{extends file="base.tpl"}

    {block name=body}
            <p>test implementation</p>
            <span class="{$block}">
                <img src="data:{$mime_type};base64,{$content}" alt="{$avatar_msg}" />
            </span>
    {/block}
