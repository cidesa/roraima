<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fctippro[anovig]', options_for_select(Constantes::Fcusoveh_Facvehcla(),$fctippro->getAnovig()),array(
   'multiple' => false,
   'size' => 5,
)); ?>