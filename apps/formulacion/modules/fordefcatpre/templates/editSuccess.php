<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/29 09:09:22
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Javascript', 'Grid', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Unidades Ejecutoras',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefcatpre/edit_header', array('fordefcatpre' => $fordefcatpre)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefcatpre/edit_messages', array('fordefcatpre' => $fordefcatpre, 'labels' => $labels)) ?>
<?php include_partial('fordefcatpre/edit_form', array('fordefcatpre' => $fordefcatpre, 'unidad' => $unidad, 'longunidad' => $longunidad,  'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefcatpre/edit_footer', array('fordefcatpre' => $fordefcatpre)) ?>
</div>

</div>
