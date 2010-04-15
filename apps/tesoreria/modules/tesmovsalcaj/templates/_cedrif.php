<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$tssalcaj->getId())
{ ?>
<?php echo Catalogo($tssalcaj,1,array(
  'getprincipal' => 'getCedrif',
  'getsecundario' => 'getNomben',
  'campoprincipal' => 'cedrif',
  'camposecundario' => 'nomben',
  'campobase' => 'cedrif_id',
  ), 'Opbenefi_Pagemiord', 'Opbenefi', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($tssalcaj, 'getCedrif' , array (
  'size' => 20,
  'control_name' => 'tssalcaj[cedrif]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($tssalcaj, 'getNomben', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'tssalcaj[nomben]',
)); echo $value ? $value : '&nbsp;';

}
?>
