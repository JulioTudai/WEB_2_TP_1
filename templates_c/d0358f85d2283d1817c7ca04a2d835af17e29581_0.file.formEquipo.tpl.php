<?php
/* Smarty version 4.2.1, created on 2022-10-10 02:31:16
  from 'C:\xampptrue\htdocs\WEB_2_TP_1\templates\formEquipo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634367d4c068c1_86433851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0358f85d2283d1817c7ca04a2d835af17e29581' => 
    array (
      0 => 'C:\\xampptrue\\htdocs\\WEB_2_TP_1\\templates\\formEquipo.tpl',
      1 => 1665360922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634367d4c068c1_86433851 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="equipos/modificar" method="post" id="formEquipo">
        <label for="id_equipo"> id equipo</label>
        <input type="number" name="id_equipo" id="id_equipo">

        <label for="pais">Pais</label>
        <input type="text" name="pais" id="pais" required>

        <label for="puntos">puntos</label>
        <input type="number" name="puntos" id="puntos" required>

        <label for="pj">pj</label>
        <input type="number" name="pj" id=pj required>

        <label for="pg">pg</label>
        <input type="number" name="pg" id=pg required>
        
        <label for="pe">pe</label>
        <input type="number" name="pe" id=pe required>
        
        <label for="pp">pp</label>
        <input type="number" name="pp" id=pp required>
        
        <label for="gf">gf</label>
        <input type="number" name="gf" id=gf required>
        
        <label for="gc">gc</label>
        <input type="number" name="gc" id=gc required>
        
        <label for="dif">dif</label>
        <input type="number" name="dif" id=dif required>
        
        <label for="grupo"></label>
        <input type="number" name="grupo" id=grupo required>

        <button id="btnModificar">Modificar Equipo</button>
        <button id="btnAgregar">Agregar Equipo</button>
</form><?php }
}
