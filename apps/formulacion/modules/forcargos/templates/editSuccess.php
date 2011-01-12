<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:editSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/03/26 19:04:45
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'tabs') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de  Cargos Formulados',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('forcargos/edit_header', array('forcargos' => $forcargos)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('forcargos/edit_messages', array('forcargos' => $forcargos, 'labels' => $labels)) ?>
<?php include_partial('forcargos/edit_form', array('forcargos' => $forcargos, 'obj' => $obj, 'lonmascar' => $lonmascar, 'mascaracargo' => $mascaracargo, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('forcargos/edit_footer', array('forcargos' => $forcargos)) ?>
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
