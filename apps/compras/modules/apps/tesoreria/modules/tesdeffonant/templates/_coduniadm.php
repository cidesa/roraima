<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php $camcatejeadm=H::getConfApp2('camcatejeadm', 'tesoreria', 'tesdeffonant');?>
<?php if ($camcatejeadm=='S')
{ ?>
<?php echo Catalogo($tsdeffonant,2,array(
  'getprincipal' => 'getCoduniadm',
  'getsecundario' => 'getDesuniadm',
  'campoprincipal' => 'coduniadm',
  'camposecundario' => 'desuniadm',
  'campobase' => 'id',
  ), 'Tsuniadm_Tesdeffonant', 'Bnubica', '', ''); ?>
<?php } else {	?>
<?php echo Catalogo($tsdeffonant,2,array(
  'getprincipal' => 'getCoduniadm',
  'getsecundario' => 'getDesuniadm',
  'campoprincipal' => 'coduniadm',
  'camposecundario' => 'desuniadm',
  'campobase' => 'id',
  ), 'Tsuniadm_Tesdeffonant', 'Tsuniadm', '', ''); ?>

<?php } ?>