<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));
//  $catparams="/param1/'+$('cpmovfuefin_tipmov').value+'";
  $id="+'&tipmov=com'";

  echo Catalogo($cpmovfuefin,3,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDescom',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'descom',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpcompro', 'cpcompro','',$id,'divGrid',1);
  //CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')
?>
