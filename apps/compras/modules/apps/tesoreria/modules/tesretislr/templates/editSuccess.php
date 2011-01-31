<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/03 14:34:07
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Javascript', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición Enterar Retenciones ISLR',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesretislr/edit_header', array('tsentislr' => $tsentislr)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesretislr/edit_messages', array('tsentislr' => $tsentislr, 'labels' => $labels)) ?>
<?php include_partial('tesretislr/edit_form', array('tsentislr' => $tsentislr, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesretislr/edit_footer', array('tsentislr' => $tsentislr)) ?>
</div>

</div>
