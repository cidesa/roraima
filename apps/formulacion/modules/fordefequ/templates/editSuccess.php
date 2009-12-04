<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/18 08:40:34
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definición de Directriz',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefequ/edit_header', array('fordefequ' => $fordefequ)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefequ/edit_messages', array('fordefequ' => $fordefequ, 'labels' => $labels)) ?>
<?php include_partial('fordefequ/edit_form', array('fordefequ' => $fordefequ, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefequ/edit_footer', array('fordefequ' => $fordefequ)) ?>
</div>

</div>
