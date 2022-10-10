<?php
/* Smarty version 4.2.1, created on 2022-10-10 02:31:16
  from 'C:\xampptrue\htdocs\WEB_2_TP_1\templates\mostrarEquipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634367d4aed023_63228641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f8daa85f24892c22162f147b831fd83c244e3ab' => 
    array (
      0 => 'C:\\xampptrue\\htdocs\\WEB_2_TP_1\\templates\\mostrarEquipos.tpl',
      1 => 1665360922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:formEquipo.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634367d4aed023_63228641 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main>
    <?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:formEquipo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
    <table>
        <thead>
            <tr>
                <?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
                <th>ID</th>
                <?php }?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
$_smarty_tpl->tpl_vars['equipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
$_smarty_tpl->tpl_vars['equipo']->do_else = false;
?>
            <tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipo']->value, 'dato', false, 'clave');
$_smarty_tpl->tpl_vars['dato']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['clave']->value => $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['clave']->value != "fk_id_grupo") {?>
                        <?php if ($_smarty_tpl->tpl_vars['clave']->value != "id_equipo" || $_smarty_tpl->tpl_vars['admin']->value) {?>
                            <td><?php echo $_smarty_tpl->tpl_vars['dato']->value;?>
</td> 
                         <?php }?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
                    <td><a href="equipos/eliminar/<?php echo $_smarty_tpl->tpl_vars['equipo']->value->id_equipo;?>
">Eliminar</a></td>
                <?php }?>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</main>
<?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
    <?php echo '<script'; ?>
 src="js/formEquipo.js"><?php echo '</script'; ?>
>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
