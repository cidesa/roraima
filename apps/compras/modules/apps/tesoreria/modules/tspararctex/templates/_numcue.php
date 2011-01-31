<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$tspararc->getId())
{ ?>
<?php echo Catalogo($tspararc,1,array(
  'getprincipal' => 'getNumcue',
  'getsecundario' => 'getNomcue',
  'campoprincipal' => 'numcue',
  'camposecundario' => 'nomcue',
  'campobase' => 'numcue_id',
  ), 'Opdefemp_tsdefban', 'Tsdefban', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($tspararc, 'getNumcue' , array (
  'size' => 20,
  'control_name' => 'tspararc[numcue]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($tspararc, 'getNomcue', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'tspararc[nomcue]',
)); echo $value ? $value : '&nbsp;';

}
?>