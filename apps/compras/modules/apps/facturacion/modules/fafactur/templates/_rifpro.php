<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php   $ajaxparams="+'&tipref='+$('fafactur_tipref').value"; ?>
<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,2,array(
  'getprincipal' => 'getRifpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'rifpro',
  'camposecundario' => 'nompro',
  'campobase' => 'rifpro_id',
  ), 'Rifcli_Fapedido', 'Facliente', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getRifpro' , array (
  'size' => 20,
  'control_name' => 'fafactur[rifpro]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getNompro', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fafactur[nompro]',
)); echo $value ? $value : '&nbsp;';

}
?>