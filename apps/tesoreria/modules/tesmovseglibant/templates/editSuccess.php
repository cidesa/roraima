<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/24 13:25:13
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Movimientos Segun Libros (Años Anteriores)',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmovseglibant/edit_header', array('tsmovlib' => $tsmovlib)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmovseglibant/edit_messages', array('tsmovlib' => $tsmovlib, 'labels' => $labels)) ?>
<?php include_partial('tesmovseglibant/edit_form', array('tsmovlib' => $tsmovlib, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmovseglibant/edit_footer', array('tsmovlib' => $tsmovlib)) ?>
</div>

</div>
