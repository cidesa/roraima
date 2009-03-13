<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocreglic[codpairecep]', options_for_select(OcestadoPeer::getEstados(),$ocreglic->getCodpairecep(),'include_custom=Seleccione uno')); ?>