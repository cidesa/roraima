<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/08/17 10:18:40
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1>
<?php if ($npestorg->getCambiareti()!="") {?>
<?php echo __($npestorg->getCambiareti(),
array()) ?>
<?php }else {?>
<?php echo __('Edición de Niveles Organizacionales',
array()) ?>
<?php }?>
</h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespnivorg/edit_header', array('npestorg' => $npestorg)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespnivorg/edit_messages', array('npestorg' => $npestorg, 'labels' => $labels)) ?>
<?php include_partial('nomdefespnivorg/edit_form', array('npestorg' => $npestorg, 'labels' => $labels,'formato'=>$formato, 'longitud' => $longitud)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespnivorg/edit_footer', array('npestorg' => $npestorg)) ?>
</div>

</div>
