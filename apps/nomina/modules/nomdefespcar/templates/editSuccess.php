<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/26 19:04:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'tabs') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de  Cargos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('nomdefespcar/edit_header', array('npcargos' => $npcargos)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('nomdefespcar/edit_messages', array('npcargos' => $npcargos, 'labels' => $labels)) ?>
<?php include_partial('nomdefespcar/edit_form', array('npcargos' => $npcargos, 'obj' => $obj, 'lonmascar' => $lonmascar, 'mascaracargo' => $mascaracargo, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('nomdefespcar/edit_footer', array('npcargos' => $npcargos)) ?>
</div>

</div>
<?php echo javascript_tag("
  salvar=function()
	{
      f=document.sf_admin_edit_form;
	  ObjetosSelectMultiple(f.associated_profecargo);
	  f.action=location.pathname;
      f.submit();
	}


") ?>
