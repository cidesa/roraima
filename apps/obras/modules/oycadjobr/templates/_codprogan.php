<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$ocadjobr->getId() || $ocadjobr->getCodprogan()=='')
{ ?>
<?php echo Catalogo($ocadjobr,2,array(
  'getprincipal' => 'getCodprogan',
  'getsecundario' => 'getDespro',
  'campoprincipal' => 'codprogan',
  'camposecundario' => 'despro',
  'campobase' => 'codprogan_id',
  ), 'Caprovee_Ocoferpre', 'caprovee', '', '' ); ?>
  <?php } else
{
	?>
<?php	$value = object_input_tag($ocadjobr, 'getCodprogan' , array (
  'size' => 20,
  'control_name' => 'ocadjobr[codprogan]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($ocadjobr, 'getDespro', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'ocadjobr[despro]',
)); echo $value ? $value : '&nbsp;';

}
?>