<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocadjobr[tipadj]', options_for_select(OctipadjPeer::getTiposadjudicacion(),$ocadjobr->getTipadj(),'include_custom=Seleccione uno')); ?>

