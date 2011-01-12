<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/06/20 10:13:56
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'Grid', 'PopUp') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Niveles Presupuestarios', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('prenivpre/edit_header', array('fordefniv' => $fordefniv)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('prenivpre/edit_messages', array('fordefniv' => $fordefniv, 'labels' => $labels)) ?>
<?php include_partial('prenivpre/edit_form', array('fordefniv' => $fordefniv, 'empresa' => $empresa, 'listacategorias' => $listacategorias, 'listaperiodos' => $listaperiodos, 'obj' => $obj, 'obj2' => $obj2, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('prenivpre/edit_footer', array('fordefniv' => $fordefniv)) ?>
</div>

</div>
