{extends file="base.tpl"}
    {block name=body}
        <table class="table_class">
            <tr class="tr_header_class">
                <th class="th_class">
                    {$table_header_msg}
                </th>
            </tr>
            {foreach from=$items key=link item=title}
            {strip}
            <tr class="tr_class">
                <td class="td_class">
                    <a href="{$link}">{$title}</a>
                </td>
            </tr>
            {/strip}
            {/foreach}
        </table>
    {/block}

