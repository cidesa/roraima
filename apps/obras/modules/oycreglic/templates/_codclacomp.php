<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&clacompras='+$('ocreglic_codclacomp').value";
?>
<?php if (!$ocreglic->getId() || ($ocreglic->getCodclacom()==''))
{ ?>
<?php echo Catalogo($ocreglic,3,array(
  'getprincipal' => 'getCodclacomp',
  'getsecundario' => 'getDesclacomp',
  'campoprincipal' => 'codclacomp',
  'camposecundario' => 'desclacomp',
  'campobase' => 'codclacomp_id',
  ), 'Clacomp_Ocreglic', 'Occlacomp', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocreglic, 'getCodclacomp' , array (
  'size' => 20,
  'control_name' => 'ocreglic[codclacomp]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocreglic, 'getDesclacomp', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocreglic[desclacomp]',
)); echo $value ? $value : '&nbsp;';

}
?>

