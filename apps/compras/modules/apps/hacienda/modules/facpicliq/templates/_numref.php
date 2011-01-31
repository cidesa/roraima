<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
	$ajaxparams="+'&fecdec='+$('fcdeclar_fecdec').value";

  echo Catalogo($fcdeclar,1,array(
  'getprincipal' => 'getNumsol',
  'getsecundario' => 'getNomneg',
  'campoprincipal' => 'numref',
  'camposecundario' => 'nomneg',
  'campobase' => 'id',
  ), 'Facpicliq_Fcsollic', 'fcsollic','',$ajaxparams,'grid1',0);

?>