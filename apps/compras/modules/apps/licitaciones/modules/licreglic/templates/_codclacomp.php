<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&clacompras='+$('lireglic_codclacomp').value";
?>
<?php if (!$lireglic->getId() || ($lireglic->getCodclacom()==''))
{ ?>
<?php echo Catalogo($lireglic,3,array(
  'getprincipal' => 'getCodclacomp',
  'getsecundario' => 'getDesclacomp',
  'campoprincipal' => 'codclacomp',
  'camposecundario' => 'desclacomp',
  'campobase' => 'codclacomp_id',
  ), 'Clacomp_Ocreglic', 'Occlacomp', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($lireglic, 'getCodclacomp' , array (
  'size' => 20,
  'control_name' => 'lireglic[codclacomp]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($lireglic, 'getDesclacomp', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'lireglic[desclacomp]',
)); echo $value ? $value : '&nbsp;';

}
?>

