{extends file="base.tpl"}

    {block name=body}
            <p id="home_page">test implementation</p>
            <span class="avatar">
                <img src="data:{$mime_type};base64,{$content}" alt="{$avatar_msg}" />
            </span>
    {/block}
