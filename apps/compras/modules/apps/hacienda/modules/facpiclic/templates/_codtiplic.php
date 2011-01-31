<?php
echo select_tag('fcsollic[codtiplic]', options_for_select(Hacienda::Listlic(),$fcsollic->getCodtiplic(),'include_custom=Seleccione'),array(
)); ?>
