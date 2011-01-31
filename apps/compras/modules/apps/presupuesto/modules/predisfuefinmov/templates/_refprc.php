<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));
//  $catparams="/param1/'+$('cpmovfuefin_tipmov').value+'";
  $id="+'&tipmov=prc'";

  echo Catalogo($cpmovfuefin,2,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDesprc',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'desprc',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpprecom', 'cpprecom','',$id,'divGrid',1);
  //CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')
?>
