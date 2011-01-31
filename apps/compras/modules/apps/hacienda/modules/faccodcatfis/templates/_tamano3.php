<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[tamano3]', options_for_select(Constantes::Tamano_N_Faccodcatfis(),$fcdefnca->getTamano3()),array(
)); ?>