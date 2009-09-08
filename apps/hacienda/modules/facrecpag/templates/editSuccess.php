<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/16 17:54:03
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Grid') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Recaudacion - Pagos', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facrecpag/edit_header', array('fcpagos' => $fcpagos)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facrecpag/edit_messages', array('fcpagos' => $fcpagos, 'labels' => $labels)) ?>
<?php include_partial('facrecpag/edit_form', array('fcpagos' => $fcpagos, 'labels' => $labels, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facrecpag/edit_footer', array('fcpagos' => $fcpagos)) ?>
</div>

</div>
