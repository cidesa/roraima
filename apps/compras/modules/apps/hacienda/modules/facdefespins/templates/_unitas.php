<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefins[unitas]', options_for_select(Constantes::Unitas_Facdefespins(),$fcdefins->getModo()),array(
)); ?>