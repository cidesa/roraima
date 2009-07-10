<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php //echo javascript_include_tag('nomina/nomnomcalnom') ?>

<?php
//  $catparams="/param1/'+$('npnomina_codnomesp').value+'";
//  $id="+'&codnomesp='+$('catbarurb_nombarurb').value";
 ?>

<?php
echo Catalogo($catregper,0,array(
  'getprincipal' => 'getCoddivgeo',
  'getsecundario' => 'getDesdivgeo',
  'campoprincipal' => 'coddivgeo',
  'camposecundario' => 'desdivgeo',
  'tamanosecundario' => '35',
  'campobase' => 'catdivgeo_id',
  ), 'Catdefdivbarurb_Catdivgeo', 'Catdivgeo','','','',1);


?>