<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[numper]', options_for_select(Constantes::Numper_Faccodcatfis(),$fcdefnca->getNumper()),array(
)); ?>