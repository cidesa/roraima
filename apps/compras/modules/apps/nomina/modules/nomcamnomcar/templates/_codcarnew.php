
<?php
  $catparams="/param1/'+$('npasicaremp_codnom').value+'";
 echo Catalogo($npasicaremp,0,array(
  'getprincipal' => 'getCodcarnew',
  'getsecundario' => 'getNomcarnew',
  'campoprincipal' => 'codcar',
  'camposecundario'=> 'nomcarnew',
  'campobase' => 'id',
  ), 'Nomasicarconnom_Npasicarnom', 'Npcargos', $catparams, '' );
?>
