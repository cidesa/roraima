<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcfuepre[frecob]', options_for_select(Constantes::Frecob_Facfueing(),$fcfuepre->getFrecob()),array(
   //'onchange' => "javascript: Ver_opcionbuttons()",
)); ?>