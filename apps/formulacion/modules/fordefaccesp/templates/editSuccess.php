<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 12:53:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Acciones Especificas',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefaccesp/edit_header', array('fordefaccesp' => $fordefaccesp)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefaccesp/edit_messages', array('fordefaccesp' => $fordefaccesp, 'labels' => $labels)) ?>
<?php include_partial('fordefaccesp/edit_form', array('fordefaccesp' => $fordefaccesp, 'labels' => $labels, 'formatoproyecto' => $formatoproyecto, 'longitudproyecto' => $longitudproyecto, 'obj' => $obj,  'estados' => $estados, 'municipios' => $municipios, 'parroquias' => $parroquias)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefaccesp/edit_footer', array('fordefaccesp' => $fordefaccesp)) ?>
</div>

</div>
