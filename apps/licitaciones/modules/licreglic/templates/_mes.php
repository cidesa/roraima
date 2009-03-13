<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('lireglic[mes]', options_for_select(Constantes::ListaMes(),$lireglic->getMes(),'include_custom=Seleccione un Mes')); ?>
