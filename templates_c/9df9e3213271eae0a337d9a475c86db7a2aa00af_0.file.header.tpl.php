<?php
/* Smarty version 4.2.1, created on 2022-10-10 02:31:16
  from 'C:\xampptrue\htdocs\WEB_2_TP_1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634367d4bbfae3_44917266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9df9e3213271eae0a337d9a475c86db7a2aa00af' => 
    array (
      0 => 'C:\\xampptrue\\htdocs\\WEB_2_TP_1\\templates\\header.tpl',
      1 => 1665360922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634367d4bbfae3_44917266 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">

    <link href="https://fonts.googleapis.com/css2?family=Tapestry&display=swap" rel="stylesheet"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text:wght@100&family=Bungee+Shade&family=Caveat&family=Chau+Philomene+One&family=Tapestry&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Text:wght@100&family=Bungee+Shade&family=Caveat&family=Tapestry&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Caveat&family=Tapestry&display=swap" rel="stylesheet">
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
</head>
<body>
    <div class="cuerpo"> 
        <header>
            <figure class="contenedorLogo">
                <a href="home"><img class="logo" src="imagenes/logo.jpg" alt="Logo qatar 2022"></a>
            </figure>
            <h1>Mundial Qatar 2022</h1>
            <button class="botonMenu"><img class="imgHamburguesa"src ="imagenes/hamburger.png"></button>
            <nav class="noMostrar" id="barraNav">
                <ul>
                    <li><a class="linksNav" href="home">Inicio</a></li>
                    <li><a class="linksNav" href="equipos">Equipos</a></li>
                    <li><a class="linksNav" href="grupos">Grupos</a></li>
                    <li><a class="linksNav" href="iniciarSesion">Iniciar Sesion</a></li>
                </ul>
            </nav>
        </header><?php }
}
