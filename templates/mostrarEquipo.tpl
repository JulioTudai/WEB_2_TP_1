{include file="header.tpl"}

    <table>
        <thead>
            <tr>
                <th>Pais</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DIF</th>
                <th>Grupo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {foreach from=$equipo item=$dato key=$clave}
                    {if $clave!="fk_id_grupo" and $clave !="id_equipo"}
                            <td>{$dato}</td>
                    {/if}
                {/foreach}

                {if $admin}
                    <td><a href="equipos/eliminar/{$equipo->id_equipo}">Eliminar</a></td>
                {/if}
            </tr>
        </tbody>
    </table>
{include file="footer.tpl"}