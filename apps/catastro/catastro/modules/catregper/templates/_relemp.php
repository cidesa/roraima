
<?php
echo select_tag('catregper[relemp]', options_for_select(Constantes::ListaRelaInst(),$catregper->getRelemp(),'include_custom=Seleccione'),array(
)); ?>
