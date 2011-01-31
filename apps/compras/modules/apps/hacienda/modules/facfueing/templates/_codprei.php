<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcfuepre,1,array(
 // SE COLOCAN LOS GETS DE LA CLASE $fcfuepre QUE HACEN
 // REFERECIA A LA TABLA CONSULTADA EN EL CATALOGO fordefparing
  'getprincipal' => 'getCodparing',
  'getsecundario' => 'getNomparing',
  //cajitas abajo se colocan el indice de la tabla $fcfuepre y la descripcion del  fordefparing
  'campoprincipal' => 'codprei',
  'camposecundario' => 'nomparing',
  'campobase' => 'id'
  ), 'Facfueing_Codprei', 'fordefparing'); ?>