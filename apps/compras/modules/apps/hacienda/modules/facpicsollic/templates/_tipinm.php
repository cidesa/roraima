<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcsollic[tipinm]', options_for_select(Constantes::Tipinm_Facpicsollic(),$fcsollic->getTipinm()),array(
   //'onchange' => "javascript: Ver_opcionbuttons()",
)); ?>