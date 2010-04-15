<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
  $parametros="/param1/".$params[0];
        echo Catalogo($cpdeftit,0,array(
        'getprincipal' => 'getCodigo1',
        'getsecundario' => 'getNombre1',
        'campoprincipal' => 'codigo1',
        'camposecundario' => 'nombre1',
        'campobase' => 'id',), 'Preasipar_Cpdeftit', 'cpdeftit',$parametros,'','grid1',0);
?>
