<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 14:42:33
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick', 'tabs', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Bancos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesdefcueban/edit_header', array('tsdefban' => $tsdefban)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesdefcueban/edit_messages', array('tsdefban' => $tsdefban, 'labels' => $labels)) ?>
<?php include_partial('tesdefcueban/edit_form', array('tsmovban_credito_debito' => $tsmovban_credito_debito, 'tsmovlib_credito_debito' => $tsmovlib_credito_debito, 'tsdefban' => $tsdefban, 'loncta' => $loncta, 'labels' => $labels, 'mascaracontabilidad' => $mascaracontabilidad, 'obj'=>$obj, 'grupo' => $grupo)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesdefcueban/edit_footer', array('tsdefban' => $tsdefban)) ?>
</div>

</div>
