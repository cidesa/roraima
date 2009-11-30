<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/07/23 16:26:39
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Ubicación',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('biedefubi/edit_header', array('bnubibie' => $bnubibie)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('biedefubi/edit_messages', array('bnubibie' => $bnubibie, 'labels' => $labels)) ?>
<?php include_partial('biedefubi/edit_form', array('bnubibie' => $bnubibie, 'labels' => $labels, 'forubi' => $forubi, 'lonubi'=> $lonubi)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('biedefubi/edit_footer', array('bnubibie' => $bnubibie)) ?>
</div>

</div>
