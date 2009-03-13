<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('atayudas[analizado]', options_for_select(Constantes::comboPrioridadAyudas(),$atayudas->getPriayu())); ?>