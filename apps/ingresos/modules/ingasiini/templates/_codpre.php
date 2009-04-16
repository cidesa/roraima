<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

$codpre = "/param1/".strlen(str_replace('#','!',Herramientas :: ObtenerFormato('cidefniv', 'forpre')));
$id="+'&cajtexcom=ciasiini_codpre'";

 echo Catalogo($ciasiini,2,array(
  'getprincipal' => 'getCodpre',
  'getsecundario' => 'getNompre',
  'campoprincipal' => 'codpre',
  'camposecundario' => 'nompre',
  'tamanoprincipal' => '32',
  'campobase' => 'cideftit_id'
  ), 'Ingadidis_cideftit', 'cideftit',$codpre,$id,'',1);

?>