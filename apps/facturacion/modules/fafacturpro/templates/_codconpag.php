<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $catparams="/param1/1";
?>
<?php if (!$fafacturpro->getId())
{ ?>
<?php echo Catalogo($fafacturpro,4,array(
  'getprincipal' => 'getCodconpag',
  'getsecundario' => 'getDesconpag',
  'campoprincipal' => 'codconpag',
  'camposecundario' => 'desconpag',
  'campobase' => 'codconpag_id',
  ), 'Codconpag_fafactur', 'Faconpag', $catparams, ''); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafacturpro, 'getCodconpag' , array (
  'size' => 20,
  'control_name' => 'fafacturpro[codconpag]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafacturpro, 'getDesconpag', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fafacturpro[desconpag]',
)); echo $value ? $value : '&nbsp;';

}
?>

<script language="JavaScript" type="text/javascript">
  $('fafacturpro_codconpag').readOnly=true;
</script>