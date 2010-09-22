<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$tsfonant->getId())
{ ?>
<?php echo Catalogo($tsfonant,1,array(
  'getprincipal' => 'getCedrif',
  'getsecundario' => 'getNomben',
  'campoprincipal' => 'cedrif',
  'camposecundario' => 'nomben',
  'campobase' => 'cedrif_id',
  ), 'Opbenefi_Pagemiord', 'Opbenefi', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($tsfonant, 'getCedrif' , array (
  'size' => 20,
  'control_name' => 'tsfonant[cedrif]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($tsfonant, 'getNomben', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'tsfonant[nomben]',
)); echo $value ? $value : '&nbsp;';

}
?>
