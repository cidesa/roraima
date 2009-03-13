<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcusoveh[anovig]', options_for_select(Constantes::Fcusoveh_Facvehcla(),$fcusoveh->getAnovig()),array(
   'multiple' => false,
   'size' => 5,
)); ?>