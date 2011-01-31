<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edición de Cliente',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('facliente/edit_header', array('facliente' => $facliente)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('facliente/edit_messages', array('facliente' => $facliente, 'labels' => $labels)) ?>
<?php include_partial('facliente/edit_form', array('facliente' => $facliente, 'encontrado' => $encontrado, 'mascara' => $mascara, 'loncta' => $loncta, 'labels' => $labels, 'c' => $c, 'ent' => $ent)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('facliente/edit_footer', array('facliente' => $facliente)) ?>
</div>

</div>
<?php echo javascript_tag("
  salvar=function()
	{
      f=document.sf_admin_edit_form;
	  ObjetosSelectMultiple(f.associated_recargo);
	  f.action=location.pathname;
      f.submit();
	}


") ?>