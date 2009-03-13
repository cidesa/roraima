<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('lireglic[codpairecep]', options_for_select(OcestadoPeer::getEstados(),$lireglic->getCodpairecep(),'include_custom=Seleccione uno')); ?>