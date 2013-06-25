{include file="header.tpl" title={$title}}
{if {$reg}}
    <p>Good job!</p>
    <a href="/login.php">Go login!</a>
{else}
    <p>Failed!</p>
    <a href="/">Try again!</a>
{/if}

{include file="footer.tpl"}