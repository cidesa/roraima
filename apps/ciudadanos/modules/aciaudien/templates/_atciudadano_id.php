<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>


<?php echo Catalogo($ataudiencias,3,array(
  'getprincipal' => 'getCedsol',
  'getsecundario' => 'getNomsol',
  'campoprincipal' => 'cedsol',
  'camposecundario'=> 'nomsol',
  'campobase' => 'atciudadano_id',
  ), 'Atsolici_Aciayudas', 'atciudadano', '' ); ?>
