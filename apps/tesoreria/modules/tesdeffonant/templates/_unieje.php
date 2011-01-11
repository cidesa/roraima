<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php $camcatejeadm=H::getConfApp2('camcatejeadm', 'tesoreria', 'tesdeffonant');?>
<?php if ($camcatejeadm=='S')
{ ?>
<?php echo Catalogo($tsdeffonant,1,array(
  'getprincipal' => 'getUnieje',
  'getsecundario' => 'getDesunieje',
  'campoprincipal' => 'unieje',
  'camposecundario' => 'desunieje',
  'campobase' => 'id',
  ), 'Bnubica_Almordcom', 'Cadefcen', '', ''); ?>
<?php } else {	?>
<?php echo Catalogo($tsdeffonant,1,array(
  'getprincipal' => 'getUnieje',
  'getsecundario' => 'getDesunieje',
  'campoprincipal' => 'unieje',
  'camposecundario' => 'desunieje',
  'campobase' => 'id',
  ), 'Bnubica_Almordcom', 'Bnubica', '', ''); ?>

<?php } ?>