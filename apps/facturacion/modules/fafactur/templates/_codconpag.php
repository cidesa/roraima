<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $catparams="/param1/'+$('fafactur_incluircliente').value+'";
?>
<?php
  $ajaxparams="+'&incluir='+$('fafactur_incluircliente').value+'&ctacli='+$('fafactur_ctacli').value";
?>
<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,4,array(
  'getprincipal' => 'getCodconpag',
  'getsecundario' => 'getDesconpag',
  'campoprincipal' => 'codconpag',
  'camposecundario' => 'desconpag',
  'campobase' => 'codconpag_id',
  ), 'Codconpag_Fafactur', 'Faconpag', $catparams, $ajaxparams); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getCodconpag' , array (
  'size' => 20,
  'control_name' => 'fafactur[codconpag]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getDesconpag', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fafactur[desconpag]',
)); echo $value ? $value : '&nbsp;';

}
?>

<script language="JavaScript" type="text/javascript">
  $('fafactur_codconpag').readOnly=true;
</script>