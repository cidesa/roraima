<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocreglic[codtiplic]', options_for_select(OctiplicPeer::getTiposLicitacion(),$ocreglic->getCodtiplic(),'include_custom=Seleccione uno')); ?>
