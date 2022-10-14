<div> 
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
            {foreach from=$equipos item=$equipo}
            <tr>
                {foreach from=$equipo item=$dato key=$clave}
                    {if ($clave!="fk_id_grupo" and $clave !="id_equipo")}
                        <td>{$dato}</td>
                    {/if}
                {/foreach}

                {if $admin}
                    <td><a href="equipos/eliminar/{$equipo->id_equipo}">Eliminar</a></td>
                    <td><a href="equipos/modificar/{$equipo->id_equipo}">Modificar</a></td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
    {*if $admin}
    <script src="js/formEquipo.js"></script>
    {/if*}
</div>
