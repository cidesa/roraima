<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&obra='+$('ocadjobr_codobr').value";
?>
<?php if (!$ocadjobr->getId())
{ ?>
<?php echo Catalogo($ocadjobr,1,array(
  'getprincipal' => 'getCodobr',
  'getsecundario' => 'getDesobr',
  'campoprincipal' => 'codobr',
  'camposecundario' => 'desobr',
  'campobase' => 'codobr_id',
  ), 'Obras_Ocadjobr', 'Ocregobr', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocadjobr, 'getCodobr' , array (
  'size' => 20,
  'control_name' => 'ocadjobr[codobr]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocadjobr, 'getDesobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocadjobr[desobr]',
)); echo $value ? $value : '&nbsp;';

}
?>

