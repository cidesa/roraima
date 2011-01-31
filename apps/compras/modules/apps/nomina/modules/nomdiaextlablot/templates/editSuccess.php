<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/20 10:21:53
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edicion Dias Extras',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdiaextlablot/edit_header', array('npdiaext' => $npdiaext)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdiaextlablot/edit_messages', array('npdiaext' => $npdiaext, 'labels' => $labels)) ?>
<?php include_partial('nomdiaextlablot/edit_form', array('npdiaext' => $npdiaext, 'labels' => $labels, 'obj' => $obj)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdiaextlablot/edit_footer', array('npdiaext' => $npdiaext)) ?>
</div>

</div>
