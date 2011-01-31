<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fctipesp[anovig]', options_for_select(Constantes::Fcusoveh_Facvehcla(),$fctipesp->getAnovig()),array(
   'multiple' => false,
   'size' => 5,
)); ?>