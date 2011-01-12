<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/27 17:06:37
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Acciones POA IVSS', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefaccpoaivss/edit_header', array('fordefaccpoa' => $fordefaccpoa)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefaccpoaivss/edit_messages', array('fordefaccpoa' => $fordefaccpoa, 'labels' => $labels)) ?>
<?php include_partial('fordefaccpoaivss/edit_form', array('fordefaccpoa' => $fordefaccpoa, 'unimed' => $unimed, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefaccpoaivss/edit_footer', array('fordefaccpoa' => $fordefaccpoa)) ?>
</div>

</div>
