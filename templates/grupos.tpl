{include file="header.tpl"}
    {foreach from=$grupos item=$grupo}
        <p>Grupo {$grupo->nombre}</p>
    {/foreach}   {*TODO// html grupos*}
{include file="footer.tpl"}