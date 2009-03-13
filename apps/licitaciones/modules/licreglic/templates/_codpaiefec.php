<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('lireglic[codpaiefec]', options_for_select(OcestadoPeer::getEstados(),$lireglic->getCodpaiefec(),'include_custom=Seleccione uno')); ?>