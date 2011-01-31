<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/23 18:56:34
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<h1>
<?php if ($cambiareticar!="S") { ?>
<?php echo __('Tipos de Cargos',
array()) ?>
<?php }else { ?>
<?php echo __($nometicar,
array()) ?>
<?php }?>
</h1>

<div id="sf_admin_header">
<?php include_partial('nomtipcar/edit_header', array('nptipcar' => $nptipcar)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomtipcar/edit_messages', array('nptipcar' => $nptipcar, 'labels' => $labels)) ?>
<?php include_partial('nomtipcar/edit_form', array('nptipcar' => $nptipcar, 'labels' => $labels, 'nuevo' => $nuevo, 'cambiareticar' => $cambiareticar, 'nometicar' => $nometicar)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomtipcar/edit_footer', array('nptipcar' => $nptipcar)) ?>
</div>

</div>
