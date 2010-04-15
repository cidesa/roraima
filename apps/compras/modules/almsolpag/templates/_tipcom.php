<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$casolpag->getId())
{ ?>
<?php echo Catalogo($casolpag,1,array(
  'getprincipal' => 'getTipcom',
  'getsecundario' => 'getNomext',
  'campoprincipal' => 'tipcom',
  'camposecundario' => 'nomext',
  'campobase' => 'tipcom_id',
  ), 'Cpdoccom_Predoccom', 'Cpdoccom', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($casolpag, 'getTipcom' , array (
  'size' => 20,
  'control_name' => 'casolpag[tipcom]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($casolpag, 'getNomext', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'casolpag[nomext]',
)); echo $value ? $value : '&nbsp;';

}
?>