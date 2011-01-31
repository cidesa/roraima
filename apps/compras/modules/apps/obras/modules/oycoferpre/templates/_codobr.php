<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&obra='+$('ocoferpre_codobr').value";
?>
<?php if (!$ocoferpre->getId())
{ ?>
<?php echo Catalogo($ocoferpre,2,array(
  'getprincipal' => 'getCodobr',
  'getsecundario' => 'getDesobr',
  'campoprincipal' => 'codobr',
  'camposecundario' => 'desobr',
  'campobase' => 'codobr_id',
  ), 'Obras_Ocoferpre', 'Ocregobr', '', $ajaxparams, 'divPar' ); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocoferpre, 'getCodobr' , array (
  'size' => 20,
  'control_name' => 'ocoferpre[codobr]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocoferpre, 'getDesobr', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocoferpre[desobr]',
)); echo $value ? $value : '&nbsp;';

}
?>

