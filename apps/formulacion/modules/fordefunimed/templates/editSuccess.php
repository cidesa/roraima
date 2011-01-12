<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 12:05:55
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion de Unidades de Medidas', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefunimed/edit_header', array('fordefunimed' => $fordefunimed)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefunimed/edit_messages', array('fordefunimed' => $fordefunimed, 'labels' => $labels)) ?>
<?php include_partial('fordefunimed/edit_form', array('fordefunimed' => $fordefunimed, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefunimed/edit_footer', array('fordefunimed' => $fordefunimed)) ?>
</div>

</div>
