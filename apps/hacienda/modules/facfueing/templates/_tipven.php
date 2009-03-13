<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcfuepre[tipven]', options_for_select(Constantes::Tipven_Facfueing(),$fcfuepre->gettipven()),array(
   //'onchange' => "javascript: Ver_opcionbuttons()",
)); ?>