{extends file="base.tpl"}
    {block name=body}
        {if $error_msg eq ""}
        <table class="table_class" align="center">
            <tr class="tr_header_class">
                <th class="th_class">
                    {$article_title_msg}
                </th>
                <th class="th_class">
                    {$published_date_msg}
                </th>
                <th class="th_class">
                    {$author_msg}
                </th>
                <th class="th_class">
                    {$article_province_msg}
                </th>
                <th class="th_class">
                    {$article_categories_msg}
                </th>

            </tr>
            {foreach from=$articles item=article}
            {strip}
            <tr class="tr_class">
                <td class="td_class">
                    <a href="view_article.php?id={$article._id}">
                        {$article.article_title}
                    </a>
                </td>
                <td>
                    <span>{$article.published_date->sec|date_format:"%Y/%m/%d"}</span>
                </td>
                <td>
                    <span>{$article.publisher_name}</span>
                </td>
                <td>
                    <span>{$article.province}</span>
                </td>
                <td>
                    {foreach from=$article.categories item=category}
                    {strip}
                    {$category}
                    {/strip}
                    {/foreach}
                </td>
            </tr>
            {/strip}
            {/foreach}
        </table>
        {/if}
    {/block}

