{include file="header.tpl"}
<h2>Grupo {$grupo}</h2>

{if $admin}
    <form action="equipos/agregar" method="post" id="formEquipo">

        <label for="pais">Pais</label>
        <input type="text" name="pais" id="pais" required>

        <label for="puntos">puntos</label>
        <input type="number" name="puntos" id="puntos" required>

        <label for="pj">pj</label>
        <input type="number" name="pj" id="pj" required>

        <label for="pg">pg</label>
        <input type="number" name="pg" id="pg" required>
        
        <label for="pe">pe</label>
        <input type="number" name="pe" id="pe" required>
        
        <label for="pp">pp</label>
        <input type="number" name="pp" id="pp" required>
        
        <label for="gf">gf</label>
        <input type="number" name="gf" id="gf" required>
        
        <label for="gc">gc</label>
        <input type="number" name="gc" id="gc" required>
        
        <label for="dif">dif</label>
        <input type="number" name="dif" id="dif" required>
        
        <label for="grupo"></label>
        <select name="grupo" id="grupo" required>
                {foreach from=$grupos item=$grupo}
                        <option value= "{$grupo->id_grupo}">Grupo {$grupo->nombre}</option>
                {/foreach}
                
        </select>

        <button id="btnAgregar">Agregar Equipo</button>
</form>
{/if}
{include file="seccionEquipos.tpl"}

{include file="footer.tpl"}