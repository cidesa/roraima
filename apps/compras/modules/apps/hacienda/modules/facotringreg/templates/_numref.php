 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
 $id='';  //"+'&numero='+$('fcotring_numsol').value+'&fecha='+$('fcotring_fecsol').value";

 $rif="'+$('fcotring_rifcon').value+'";
 $rif2="'+$('fcotring_rifrep').value+'";
 $rf = ($rif=='') ? $rif2 : $rif;
 $catparams="/param1/".$rf;

  echo Catalogo($fcotring,0,array(
	  'getprincipal' => 'getNumlic',
	  'getsecundario' => 'getNomneg',
	  // cajitasss
	  'campoprincipal' => 'numlic',
	  'camposecundario' => 'nomneg',
	  'campobase' => 'id',
	  ), 'Facotringreg_Numref', 'Fcsollic', $catparams, $id,'','0'); ?>
