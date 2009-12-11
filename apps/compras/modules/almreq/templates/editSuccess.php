<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/17 15:02:06
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Grid', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Requisición',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('almreq/edit_header', array('careqart' => $careqart)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('almreq/edit_messages', array('careqart' => $careqart, 'labels' => $labels)) ?>
<?php include_partial('almreq/edit_form', array('careqart' => $careqart, 'obj' => $obj, 'forubi' => $forubi, 'lonubi'=>$lonubi, 'labels' => $labels, 'autorizareq' => $autorizareq, 'numdesh' => $numdesh)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('almreq/edit_footer', array('careqart' => $careqart)) ?>
</div>

</div>
