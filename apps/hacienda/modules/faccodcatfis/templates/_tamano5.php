<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[tamano5]', options_for_select(Constantes::Tamano_N_Faccodcatfis(),$fcdefnca->getTamano5()),array(
)); ?>