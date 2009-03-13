<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcvalinm[anovig]', options_for_select(Constantes::Fcusoveh_Facvehcla(),$fcvalinm->getAnovig()),array(
   'multiple' => false,
   'size' => 5,
)); ?>