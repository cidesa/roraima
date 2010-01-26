<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/30 16:11:24
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date','Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Activos Muebles',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('bieregactmued/edit_header', array('bnregmue' => $bnregmue)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('bieregactmued/edit_messages', array('bnregmue' => $bnregmue, 'labels' => $labels)) ?>
<?php include_partial('bieregactmued/edit_form', array('bnregmue' => $bnregmue, 'labels' => $labels, 'forubi' => $forubi, 'lonubi'=> $lonubi, 'foract' => $foract, 'lonact'=> $lonact, 'incorporacion'=> $incorporacion, 'desincorp' => $desincorp)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('bieregactmued/edit_footer', array('bnregmue' => $bnregmue)) ?>
</div>

</div>
