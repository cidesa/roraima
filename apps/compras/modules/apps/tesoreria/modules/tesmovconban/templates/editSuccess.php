<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/24 13:43:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Linktoapp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Conciliación Bancaria',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmovconban/edit_header', array('tsconcil' => $tsconcil)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmovconban/edit_messages', array('tsconcil' => $tsconcil, 'labels' => $labels)) ?>
<?php include_partial('tesmovconban/edit_form', array('tsconcil' => $tsconcil, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmovconban/edit_footer', array('tsconcil' => $tsconcil)) ?>
</div>

</div>
