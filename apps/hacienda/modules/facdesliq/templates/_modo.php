<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefdesc[modo]', options_for_select(Constantes::TipoModo(),$fcdefdesc->getModo())); ?>