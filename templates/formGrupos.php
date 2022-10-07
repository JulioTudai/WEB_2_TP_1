<head>
    <base href="<?php echo BASE_URL ?>">
</head>
<form method="post">
    <label for="nombre">nombre de grupo</label>
    <input type="text" id="nombre" name="nombre">

    <label for="finTrue">grupo abierto</label>
    <input type="radio" name="finalizado" value="1" id="finTrue">

    <label for="finFalse">grupo finalizado</label>
    <input type="radio" name="finalizado" value="0" id="finFalse">
    <button>Enviar Grupo</button>
</form>
