<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefrecint[modo]', options_for_select(Constantes::Modo_Fcdefrecint(),$fcdefrecint->getModo()),array(
   'onchange' => "javascript: Ver_opcionbuttons()",
)); ?>