<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('contaba[corcomp]', options_for_select(Constantes::ListaFormatoComprobante(),$contaba->getCorcomp(),'include_custom=Seleccione uno')); ?>
