{include file="header.tpl"}

<form method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email">

    <label for="contrasenia">Contraseña</label>
    <input type="password" name="contrasenia" id="contrasenia">

    <button>{$boton}</button>
</form>

{include file="footer.tpl"}