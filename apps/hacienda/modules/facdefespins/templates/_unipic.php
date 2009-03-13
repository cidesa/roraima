<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>


<?php

echo select_tag('fcdefins[unipic]', options_for_select(Constantes::Unipic_Facdefespins(),$fcdefins->getModo()),array(
)); ?>