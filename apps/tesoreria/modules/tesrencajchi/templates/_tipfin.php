<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$opordpag->getId())
{ ?>
<?php echo Catalogo($opordpag,3,array(
  'getprincipal' => 'getTipfin',
  'getsecundario' => 'getNomext2',
  'campoprincipal' => 'tipfin',
  'camposecundario' => 'nomext2',
  'campobase' => 'tipfin_id',
  ), 'Fortipfin_Pagemiord', 'Fortipfin', '', ''); ?>
<?php } else
{
	?>
<?php	$value = object_input_tag($opordpag, 'getTipfin' , array (
  'size' => 20,
  'control_name' => 'opordpag[tipfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($opordpag, 'getNomext2', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;';

}
?>
