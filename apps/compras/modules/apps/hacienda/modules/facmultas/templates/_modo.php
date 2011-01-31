<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcmultas[modo]', options_for_select(Constantes::Modo_Fcmultas(),$fcmultas->getModo()),array(
   //'onchange' => "javascript: Ver_opcionbuttons()",
)); ?>