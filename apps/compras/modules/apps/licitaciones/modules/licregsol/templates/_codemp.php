<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
$catparams="/param1/'+$('liregsol_licomlic_id').value+'";

 echo Catalogo($liregsol,0,array(
  'getprincipal' => 'getCodemp',
  'getsecundario' => 'getNomemp',
  'campoprincipal' => 'codemp',
  'camposecundario'=> 'nomemp',
  'campobase' => 'lidetcom_id',
  ), 'Lidetcom_licregsol', 'Nphojint', $catparams );
?>
