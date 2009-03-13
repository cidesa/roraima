<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefnca[denumper]', options_for_select(Constantes::Denumper_Faccodcatfis(),$fcdefnca->getDenumper()),array(
)); ?>