<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title>{$title}</title>
        {foreach from=$jsFiles item=jsFile}
        {strip}
            <script src="{$jsFolder}/{$jsFile}" type="text/javascript" language="javascript" charset="utf-8"></script>
        {/strip}
        {/foreach}

        {foreach from=$cssFiles item=cssFile}
        {strip}
            <link rel="stylesheet" href="{$cssFolder}/{$cssFile}" type="text/css" media="screen" />
        {/strip}
        {/foreach}
    </head>
    <body>
        {$message}
    </body>
</html>
