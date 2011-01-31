<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocreglic[codpaiefec]', options_for_select(OcestadoPeer::getEstados(),$ocreglic->getCodpaiefec(),'include_custom=Seleccione uno')); ?>