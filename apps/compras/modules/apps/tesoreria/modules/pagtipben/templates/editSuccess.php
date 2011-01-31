<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/24 10:38:50
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Tipos de Beneficiario',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pagtipben/edit_header', array('optipben' => $optipben)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pagtipben/edit_messages', array('optipben' => $optipben, 'labels' => $labels)) ?>
<?php include_partial('pagtipben/edit_form', array('optipben' => $optipben, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pagtipben/edit_footer', array('optipben' => $optipben)) ?>
</div>

</div>
