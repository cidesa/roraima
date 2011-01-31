<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$ocoferpre->getId())
{ ?>
<?php echo Catalogo($ocoferpre,1,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'codpro',
  'camposecundario' => 'nompro',
  'campobase' => 'codpro_id',
  ), 'Caprovee_Ocoferpre', 'caprovee', '', '' ); ?>
  <?php } else
{
	?>
<?php	$value = object_input_tag($ocoferpre, 'getCodpro' , array (
  'size' => 20,
  'control_name' => 'ocoferpre[codpro]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocoferpre, 'getNompro', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocoferpre[nompro]',
)); echo $value ? $value : '&nbsp;';

}
?>