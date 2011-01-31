<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&tipofin='+$('ocreglic_codfin').value";
?>
<?php if (!$ocreglic->getId())
{ ?>
<?php echo Catalogo($ocreglic,2,array(
  'getprincipal' => 'getCodfin',
  'getsecundario' => 'getNomext',
  'campoprincipal' => 'codfin',
  'camposecundario' => 'nomext',
  'campobase' => 'codfin_id',
  ), 'Tipofin_Ocreglic', 'Fortipfin', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocreglic, 'getCodfin' , array (
  'size' => 20,
  'control_name' => 'ocreglic[codfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocreglic, 'getNomext', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocreglic[nomext]',
)); echo $value ? $value : '&nbsp;';

}
?>

