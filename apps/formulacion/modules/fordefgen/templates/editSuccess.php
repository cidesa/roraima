<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/20 09:40:40
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Definiciones Generales',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('fordefgen/edit_header', array('fordefegrgen' => $fordefegrgen)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('fordefgen/edit_messages', array('fordefegrgen' => $fordefegrgen, 'labels' => $labels)) ?>
<?php include_partial('fordefgen/edit_form', array('fordefegrgen' => $fordefegrgen, 'labels' => $labels, 'forpre' => $forpre, 'codpariva' => $codpariva)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('fordefgen/edit_footer', array('fordefegrgen' => $fordefegrgen)) ?>
</div>

</div>
