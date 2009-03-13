<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$fapedido->getId())
{ ?>
<?php echo Catalogo($fapedido,2,array(
  'getprincipal' => 'getRifpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'rifpro',
  'camposecundario' => 'nompro',
  'campobase' => 'rifpro_id',
  ), 'Rifcli_Fapedido', 'Facliente', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($fapedido, 'getRifpro' , array (
  'size' => 20,
  'control_name' => 'fapedido[rifpro]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fapedido, 'getNompro', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fapedido[nompro]',
)); echo $value ? $value : '&nbsp;';

}
?>