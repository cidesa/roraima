<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php   $ajaxparams="+'&tipref='+$('fafacturpro_tipref').value"; ?>
<?php if (!$fafacturpro->getId())
{ ?>
<?php echo Catalogo($fafacturpro,3,array(
  'getprincipal' => 'getRifpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'rifpro',
  'camposecundario' => 'nompro',
  'campobase' => 'rifpro_id',
  ), 'Rifcli_Fapedido', 'Facliente', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($fafacturpro, 'getRifpro' , array (
  'size' => 20,
  'control_name' => 'fafacturpro[rifpro]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafacturpro, 'getNompro', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fafacturpro[nompro]',
)); echo $value ? $value : '&nbsp;';

}
?>