<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&obra='+$('ocreglic_codobr').value";
?>
<?php if (!$ocreglic->getId())
{ ?>
<?php echo Catalogo($ocreglic,1,array(
  'getprincipal' => 'getCodobr',
  'getsecundario' => 'getDesobr',
  'campoprincipal' => 'codobr',
  'camposecundario' => 'desobr',
  'campobase' => 'codobr_id',
  ), 'Obras_Ocadjobr', 'Ocregobr', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocreglic, 'getCodobr' , array (
  'size' => 20,
  'control_name' => 'ocreglic[codobr]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocreglic, 'getDesobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocreglic[desobr]',
)); echo $value ? $value : '&nbsp;';

}
?>

