<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/14 16:07:09
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'PopUp', 'Linktoapp' ) ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Tipos de Retenciones',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagtipret/edit_header', array('optipret' => $optipret)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagtipret/edit_messages', array('optipret' => $optipret, 'labels' => $labels)) ?>
<?php include_partial('pagtipret/edit_form', array('optipret' => $optipret, 'mascaracontabilidad' => $mascaracontabilidad, 'loncta' => $loncta, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagtipret/edit_footer', array('optipret' => $optipret)) ?>
</div>

</div>
