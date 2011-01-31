<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/11/23 14:28:48
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Conceptos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomcalcon/edit_header', array('npcalcon' => $npcalcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomcalcon/edit_messages', array('npcalcon' => $npcalcon, 'labels' => $labels)) ?>
<?php include_partial('nomcalcon/edit_form', array('npcalcon' => $npcalcon, 'labels' => $labels, 'lista1' => $lista1, 'lista2' => $lista2, 'obj' => $obj, 'ent' => $ent,'objlistcon' => $objlistcon,'objlistmov' => $objlistmov,'objlisthis' => $objlisthis,'objlistvar' => $objlistvar)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomcalcon/edit_footer', array('npcalcon' => $npcalcon)) ?>
</div>

</div>
