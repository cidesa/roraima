<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/10/25 17:49:03
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Actualizacion en Lotes de los Bancos',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('tesmoslib/edit_header', array('tsmovban' => $tsmovban)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesmoslib/edit_messages', array('tsmovban' => $tsmovban, 'labels' => $labels)) ?>
<?php include_partial('tesmoslib/edit_form', array('tsmovban' => $tsmovban, 'labels' => $labels, 'callback' => $callback, 'c' => $c)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesmoslib/edit_footer', array('tsmovban' => $tsmovban)) ?>
</div>

</div>
<?php echo javascript_tag("
  salvarsave=function()
	{
      f=document.sf_admin_edit_form;
	  ObjetosSelectMultiple(f.associated_libros_selec);
	  f.action=location.pathname;
      f.submit();
	}


") ?>

