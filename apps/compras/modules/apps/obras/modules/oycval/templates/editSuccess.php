<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 15:10:11
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Valuaciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycval/edit_header', array('ocregval' => $ocregval)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycval/edit_messages', array('ocregval' => $ocregval, 'labels' => $labels)) ?>
<?php include_partial('oycval/edit_form', array('ocregval' => $ocregval,  'tipos' => $tipos, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'obj4' => $obj4, 'val_ant' => $val_ant, 'val_par' => $val_par, 'val_fin' => $val_fin, 'val_ret' => $val_ret, 'val_rec' => $val_rec, 'con_obra' => $con_obra, 'con_ins' => $con_ins, 'con_sup' => $con_sup, 'con_pro' => $con_pro, 'ivaant' => $ivaant, 'retant' => $retant, 'par_rec' => $par_rec, 'verifica_anular' => $verifica_anular, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycval/edit_footer', array('ocregval' => $ocregval)) ?>
</div>

</div>
