{extends file="base.tpl"}
    {block name=body}
    <div id="content">
        <form id="mainform" action="{$action}" method="post" class="mainform" enctype="multipart/form-data">
            {block name=form}{/block}
        </form>
    </div>
    <div id="modal_window">
        <div id="dialog" class="window">
            <form id="modal_form" action="{$action}" method="post" class="modal_form">
                {block name=modalform}{/block}
            </form>
            <div id="description">Something</div>
        </div>
        <div id="mask"></div>
    </div>
    {/block}
