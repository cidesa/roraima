<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/28 10:06:27
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Asociaciones de Acciones POA a Acciones Especoficas - Proyectos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefpryaccsubaccivss/edit_header', array('forasopryaccespsubacc' => $forasopryaccespsubacc)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefpryaccsubaccivss/edit_messages', array('forasopryaccespsubacc' => $forasopryaccespsubacc, 'labels' => $labels)) ?>
<?php include_partial('fordefpryaccsubaccivss/edit_form', array('forasopryaccespsubacc' => $forasopryaccespsubacc, 'pnom' => $pnom, 'pproac' => $pproac, 'rs' => $rs, 'descripcion' => $descripcion, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefpryaccsubaccivss/edit_footer', array('forasopryaccespsubacc' => $forasopryaccespsubacc)) ?>
</div>

</div>
