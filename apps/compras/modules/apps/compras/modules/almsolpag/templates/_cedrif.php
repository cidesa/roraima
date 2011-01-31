<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$casolpag->getId())
{ ?>
<?php echo Catalogo($casolpag,2,array(
  'getprincipal' => 'getCedrif',
  'getsecundario' => 'getNomben',
  'campoprincipal' => 'cedrif',
  'camposecundario' => 'nomben',
  'campobase' => 'cedrif_id',
  ), 'Opbenefi_Tesmovemiche', 'Opbenefi', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($casolpag, 'getCedrif' , array (
  'size' => 20,
  'control_name' => 'casolpag[cedrif]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($casolpag, 'getNomben', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'casolpag[nomben]',
)); echo $value ? $value : '&nbsp;';

}
?>