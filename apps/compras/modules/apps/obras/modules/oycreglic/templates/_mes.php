<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('ocreglic[mes]', options_for_select(Constantes::ListaMes(),$ocreglic->getMes(),'include_custom=Seleccione un Mes')); ?>
