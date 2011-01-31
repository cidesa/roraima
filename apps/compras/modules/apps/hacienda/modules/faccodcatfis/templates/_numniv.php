<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[numniv]', options_for_select(Constantes::Numniv_Faccodcatfis(),$fcdefnca->getNumniv()),array(
)); ?>