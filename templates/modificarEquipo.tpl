{include file="header.tpl"}
<form action="" method="post" id="formEquipo">

        <label for="pais">Pais</label>
        <input type="text" name="pais" id="pais" required value={$valuePais}>

        <label for="puntos">puntos</label>
        <input type="number" name="puntos" id="puntos" value={$valuePuntos} required>

        <label for="pj">pj</label>
        <input type="number" name="pj" id="pj" value={$valuePj} required>

        <label for="pg">pg</label>
        <input type="number" name="pg" id="pg" value={$valuePg} required>
        
        <label for="pe">pe</label>
        <input type="number" name="pe" id="pe" value={$valuePe} required>
        
        <label for="pp">pp</label>
        <input type="number" name="pp" id="pp" value={$valuePp} required>
        
        <label for="gf">gf</label>
        <input type="number" name="gf" id="gf" value={$valueGf} required>
        
        <label for="gc">gc</label>
        <input type="number" name="gc" id="gc" value={$valueGc} required>
        
        <label for="dif">dif</label>
        <input type="number" name="dif" id="dif" value={$valueDif} required>
        
        <label for="grupo"></label>
        <select name="grupo" id="grupo" required>
                {foreach from=$grupos item=$grupo}
                        <option value= "{$grupo->id_grupo}">Grupo {$grupo->nombre}</option>
                {/foreach}
                
        </select>

        <button>Modificar</button>
</form>
{include file="footer.tpl"}