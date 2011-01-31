<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/03 19:46:21
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript', 'SubmitClick') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Registro de Contratos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('oycdescon/edit_header', array('ocregcon' => $ocregcon)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('oycdescon/edit_messages', array('ocregcon' => $ocregcon, 'labels' => $labels)) ?>
<?php include_partial('oycdescon/edit_form', array('ocregcon' => $ocregcon, 'obj' => $obj, 'obj2' => $obj2, 'obj3' => $obj3, 'obj4' => $obj4, 'labels' => $labels, 'tipeje' => $tipeje, 'con_ins' => $con_ins, 'con_sup' => $con_sup, 'con_obra' => $con_obra, 'con_pro' => $con_pro, 'verifica_anular' => $verifica_anular, 'verifica_eliminar' => $verifica_eliminar)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('oycdescon/edit_footer', array('ocregcon' => $ocregcon)) ?>
</div>

</div>
