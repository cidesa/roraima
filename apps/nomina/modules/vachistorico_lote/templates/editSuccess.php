<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/24 23:51:35
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Vacaciones Disfrutadas en Lote',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('vachistorico_lote/edit_header', array('npvacdisfrute' => $npvacdisfrute)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('vachistorico_lote/edit_messages', array('npvacdisfrute' => $npvacdisfrute, 'labels' => $labels)) ?>
<?php include_partial('vachistorico_lote/edit_form', array('npvacdisfrute' => $npvacdisfrute, 'labels' => $labels, 'obj' => $obj, 'arranos' => $arranos, 'arranom' => $arranom)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('vachistorico_lote/edit_footer', array('npvacdisfrute' => $npvacdisfrute)) ?>
</div>

</div>
