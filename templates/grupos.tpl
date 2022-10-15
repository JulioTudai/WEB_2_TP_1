{include file="header.tpl"}
    {if $admin}
        <form action="grupos/agregar"method="post">
        <label for="nombre">nombre de grupo</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="finTrue">grupo abierto</label>
        <input type="radio" name="finalizado" value="0" id="finTrue" required>

        <label for="finFalse">grupo finalizado</label>
        <input type="radio" name="finalizado" value="1" id="finFalse">

        <button>Agregar Grupo</button>
    </form>
    {/if}
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
                <td>{$grupo->nombre}</td>
                <td>{if ($grupo->finalizado)}
                    Finalizado
                    {else}
                    No Finalizado
                    {/if}
                </td>
                <td><a href="equipos?grupo={$grupo->id_grupo}"</a>Ver grupo</td>

                {if $admin}
                    <td><a href="grupos/eliminar/{$grupo->id_grupo}">Eliminar</a></td>
                    <td><a href="grupos/modificar/{$grupo->id_grupo}">Modificar</a></td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
{include file="footer.tpl"}