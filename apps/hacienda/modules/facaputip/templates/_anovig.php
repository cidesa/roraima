<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fctipapu[anovig]', options_for_select(Constantes::Fcusoveh_Facvehcla(),$fctipapu->getAnovig()),array(
   'multiple' => false,
   'size' => 5,
)); ?>