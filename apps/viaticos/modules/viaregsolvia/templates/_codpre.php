<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));

  echo Catalogo($viaregsolvia,0,array(
  'getprincipal' => 'getCodpre',
  'getsecundario' => 'getNompre',
  'campoprincipal' => 'codpre',
  'camposecundario' => 'nompre',
  'campobase' => 'id',
  ), 'Viaregsolvia_Cpdeftit', 'cpdeftit',$forpre,'','',1);
  //CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')


?>
