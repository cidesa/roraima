<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php //echo javascript_include_tag('nomina/nomnomcalnom') ?>

<?php
//  $catparams="/param1/'+$('npnomina_codnomesp').value+'";
  //$id="+'&id='+$('catman_coddivgeo').value";
 ?>

<?php
echo Catalogo($catman,1,array(
  'getprincipal' => 'getCoddivgeo',
  'getsecundario' => 'getDesdivgeo',
  'campoprincipal' => 'coddivgeo',
  'camposecundario' => 'desdivgeo',
  'campobase' => 'catdivgeo_id',
  ), 'Catdefdivbarurb_Catdivgeo', 'Catdivgeo','','','linderos',1);


?>