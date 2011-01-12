<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/11/07 17:08:52
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Formulación del Plan Operativo por Unidad Ejecutora',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('forpoa_uae/edit_header', array('forencpryaccespmet' => $forencpryaccespmet)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('forpoa_uae/edit_messages', array('forencpryaccespmet' => $forencpryaccespmet, 'labels' => $labels)) ?>
<?php include_partial('forpoa_uae/edit_form', array('forencpryaccespmet' => $forencpryaccespmet, 'labels' => $labels, 'obj' => $obj, 'formatouae' => $formatouae)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('forpoa_uae/edit_footer', array('forencpryaccespmet' => $forencpryaccespmet)) ?>
</div>

</div>
