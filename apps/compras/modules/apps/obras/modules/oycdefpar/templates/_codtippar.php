<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocdefpar[codtippar]', options_for_select(OctipparPeer::getTipospar(),$ocdefpar->getCodtippar(),'include_custom=Seleccione uno')); ?>
