<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $ajaxparams="+'&unidad='+$('ocdefpar_coduni').value";
?>
<?php if (!$ocdefpar->getId())
{ ?>
<?php echo Catalogo($ocdefpar,2,array(
  'getprincipal' => 'getCoduni',
  'getsecundario' => 'getDesuni',
  'campoprincipal' => 'coduni',
  'camposecundario' => 'desuni',
  'campobase' => 'coduni_id',
  ), 'Unidad_Ocdefpar', 'Ocunidad', '', $ajaxparams); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($ocdefpar, 'getCoduni' , array (
  'size' => 20,
  'control_name' => 'ocdefpar[coduni]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocdefpar, 'getDesuni', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocdefpar[desuni]',
)); echo $value ? $value : '&nbsp;';

}
?>

