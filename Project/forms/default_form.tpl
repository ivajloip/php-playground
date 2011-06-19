{extends file="base.tpl"}
    {block name=body}
        <form id="{$form_id}" action="{$action}" method="post" class="{$form_class}">
            {block name=form}Default Body{/block}
        </form>
    {/block}
