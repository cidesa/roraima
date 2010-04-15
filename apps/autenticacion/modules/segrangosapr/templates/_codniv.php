<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$segranapr->getId())
{ ?>
<?php echo Catalogo($segranapr,1,array(
  'getprincipal' => 'getCodniv',
  'getsecundario' => 'getDesniv',
  'campoprincipal' => 'codniv',
  'camposecundario' => 'desniv',
  'campobase' => 'codniv_id',
  ), 'Segnivapr_Usuarios', 'Segnivapr', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($segranapr, 'getCodniv' , array (
  'size' => 20,
  'control_name' => 'segranapr[codniv]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($segranapr, 'getDesniv', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'segranapr[desniv]',
)); echo $value ? $value : '&nbsp;';

}
?>