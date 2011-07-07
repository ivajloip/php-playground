{extends file="base.tpl"}
    {block name=body}
        {if $error_msg eq ""}
        <table class="table_class">
            <tr class="tr_header_class">
                <th class="th_class">
                    {$username_msg}
                </th>
                <th class="th_class">
                    {$display_name_msg}
                </th>
                <th class="th_class">
                    {$email_msg}
                </th>
            </tr>
            {foreach from=$users item=user}
            {strip}
            <tr class="tr_class">
                <td class="td_class">
                    <a href="edit_profile.php?id={$user._id}">
                        {$user.username}
                    </a>
                </td>
                <td>
                    <span>{$user.display_name}</span>
                </td>
                <td>
                    <span>{$user.email}</span>
                </td>
            </tr>
            {/strip}
            {/foreach}
        </table>
        {/if}
    {/block}

