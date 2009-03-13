<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&obra='+$('ocemppar_codobr').value";
?>
<?php if (!$ocemppar->getId())
{ ?>
<?php echo Catalogo($ocemppar,1,array(
  'getprincipal' => 'getCodobr',
  'getsecundario' => 'getDesobr',
  'campoprincipal' => 'codobr',
  'camposecundario' => 'desobr',
  'campobase' => 'codobr_id',
  ), 'Obras_Ocadjobr', 'Ocregobr', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocemppar, 'getCodobr' , array (
  'size' => 20,
  'control_name' => 'ocemppar[codobr]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocemppar, 'getDesobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocemppar[desobr]',
)); echo $value ? $value : '&nbsp;';

}
?>

