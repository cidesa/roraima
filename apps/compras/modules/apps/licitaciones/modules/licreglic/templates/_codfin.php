<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&tipofin='+$('lireglic_codfin').value";
?>
<?php if (!$lireglic->getId() or $lireglic->getCodfin()=="")
{ ?>
<?php echo Catalogo($lireglic,2,array(
  'getprincipal' => 'getCodfin',
  'getsecundario' => 'getNomext',
  'campoprincipal' => 'codfin',
  'camposecundario' => 'nomext',
  'campobase' => 'codfin_id',
  ), 'Tipofin_Ocreglic', 'Fortipfin', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($lireglic, 'getCodfin' , array (
  'size' => 20,
  'control_name' => 'lireglic[codfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($lireglic, 'getNomext', array (
  'size' => 40,
  'disabled' => true,
  'control_name' => 'lireglic[nomext]',
)); echo $value ? $value : '&nbsp;';

}
?>

