{include file="header.tpl"}
    <form method="post">
        <label for="nombre">nombre de grupo</label>
        <input type="text" id="nombre" name="nombre" value="{$valueNombre}" required>

        <label for="finTrue">grupo abierto</label>
        <input type="radio" name="finalizado" value="0" id="finTrue" {if (!$valueFinalizado)} checked {/if} required>

        <label for="finFalse">grupo finalizado</label>
        <input type="radio" name="finalizado" value="1" id="finFalse" {if ($valueFinalizado)} checked {/if}>

        <button>Modificar Grupo</button>
    </form>
{include file="footer.tpl"}