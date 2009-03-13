<?php use_helper('Catalogo') ?>

<?php echo Catalogo($bndismue,3,array(
  'getprincipal' => 'getCodmot',
  'getsecundario' => 'getDesmot',
  'campoprincipal' => 'codmot',
  'camposecundario'=> 'desmot',
  'campobase' => 'xxx',
  ), 'Biedisactinmlot_Bnmotdis', 'bnmotdis', '' );
?>