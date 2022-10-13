<div> 
    {if $admin}
        {include file="formEquipo.tpl"}
    {/if}
    <table>
        <thead>
            <tr>
                {if $admin}
                <th>ID</th>
                {/if}
                <th>Pais</th>
                <th>Puntos</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DIF</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$equipos item=$equipo}
            <tr>
                {foreach from=$equipo item=$dato key=$clave}
                    {if $clave!="fk_id_grupo"}
                        {if $clave !="id_equipo" or $admin}
                            <td>{$dato}</td> 
                         {/if}
                    {/if}
                {/foreach}

                {if $admin}
                    <td><a href="equipos/eliminar/{$equipo->id_equipo}">Eliminar</a></td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
    {if $admin}
    <script src="js/formEquipo.js"></script>
    {/if}
</div>
