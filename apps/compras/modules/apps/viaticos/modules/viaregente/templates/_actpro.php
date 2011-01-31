
<?php
echo select_tag('viaregente[actpro]', options_for_select(Viaregact::ListAct(),$viaregente->getactpro(),'include_custom=Seleccione'),array(
)); ?>
