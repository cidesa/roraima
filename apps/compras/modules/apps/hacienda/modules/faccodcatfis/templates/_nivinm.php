<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[nivinm]', options_for_select(Constantes::Numniv_Faccodcatfis(),$fcdefnca->getNivinm()),array(
)); ?>