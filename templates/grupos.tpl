{include file="header.tpl"}
    <table>
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Ha finalizado</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$grupos item=$grupo}
            <tr>
                {foreach from=$grupo item=$dato key=$clave}
                    {if ($clave!="id_grupo")}
                        <td>{$dato}</td>
                    {/if}
                {/foreach}

                {if $admin}
                    <td><a href="grupos/eliminar/{$grupo->id_grupo}">Eliminar</a></td>
                    <td><a href="grupos/modificar/{$grupo->id_grupo}">Modificar</a></td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
{include file="footer.tpl"}